<?php

$str = file_get_contents('../config.json');
$db = json_decode($str, true);

function query(/* $sql [, ... ] */)
{
    global $db;
    // SQL statement
    $sql = func_get_arg(0);

    // parameters, if any
    $parameters = array_slice(func_get_args(), 1);

    // try to connect to database
    static $handle;
    if (!isset($handle))
    {
        try
        {
            // connect to database
            $handle = new PDO(
                "mysql:dbname=" . $db['dbname'] . ";host=" . $db['host'],
                $db['username'],
                $db['password']
                );
        }
        catch (Exception $e)
        {
            // trigger (big, orange) error
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }

    // ensure number of placeholders matches number of values
    $pattern = "
    /(?:
        '[^'\\\\]*(?:(?:\\\\.|'')[^'\\\\]*)*'
        | \"[^\"\\\\]*(?:(?:\\\\.|\"\")[^\"\\\\]*)*\"
        | `[^`\\\\]*(?:(?:\\\\.|``)[^`\\\\]*)*`
        )(*SKIP)(*F)| \?/x";

    preg_match_all($pattern, $sql, $matches);
    if (count($matches[0]) < count($parameters))
    {
        trigger_error("Too few placeholders in query", E_USER_ERROR);
    }
    else if (count($matches[0]) > count($parameters))
    {
        trigger_error("Too many placeholders in query", E_USER_ERROR);
    }

    // replace placeholders with quoted, escaped strings
    $patterns = [];
    $replacements = [];
    for ($i = 0, $n = count($parameters); $i < $n; $i++)
    {
        array_push($patterns, $pattern);
        array_push($replacements, preg_quote($handle->quote($parameters[$i])));
    }
    $query = preg_replace($patterns, $replacements, $sql, 1);

    // execute query
    $statement = $handle->query($query);
    if ($statement === false)
    {
        trigger_error($handle->errorInfo()[2], E_USER_ERROR);
    }

    // if query was SELECT
    if ($statement->columnCount() > 0)
    {
    // return result set's rows
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // if query was DELETE, INSERT, or UPDATE
    else
    {
    // return number of rows affected
    return $statement->rowCount();
    }
}

?>
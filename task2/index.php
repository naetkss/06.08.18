<?php

ini_set('display_errors', 1);

const INPUT_DATA = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';

/**
 * removes parameters with a value of three
 *
 * @param array $params
 * @return array
 */
function deleteValueThree(array $params): array
{
    array_walk($params, function ($item, $key) use (&$params) {
        if ((int)$item === 3) {
            unset($params[$key]);
        }
    });

    return $params;
}

/**
 * converts query to an array
 *
 * @param string $stringQuery
 * @return array
 */
function queryToArray(string $stringQuery): array
{
    return array_reduce(explode('&', $stringQuery), function ($carry, $item) {
        $values = explode('=', $item);
        $carry[$values[0]] = $values[1];
        return $carry;
    }, []);
}

/**
 * build a query from an array into a string
 *
 * @param array $query
 * @return string
 */
function buildQueryToString(array $query): string
{
    return http_build_query($query);
}

/**
 * build a Uri from an array to string
 *
 * @param array $parsedUrl
 * @return string
 */
function unParseUri(array $parsedUrl): string
{
    return sprintf('%s://%s/?%s',
        $parsedUrl['scheme'] ?? '',
        $parsedUrl['host'] ?? '',
        $parsedUrl['query'] ?? ''
    );
}

$parsedUrl = parse_url(INPUT_DATA);
$query = queryToArray($parsedUrl['query']);
$query = deleteValueThree($query);
asort($query);
$query['url'] = $parsedUrl['path'];
$parsedUrl['query'] = buildQueryToString($query);

echo unParseUri($parsedUrl);
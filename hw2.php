<?php
  $query = 'SELECT TOP(corpus, 10) as title, COUNT(*) as unique_words ' .
         'FROM [publicdata:samples.shakespeare]';
$options = ['useLegacySql' => true];
$queryResults = $bigQuery->runQuery($query, $options);

if ($queryResults->isComplete()) {
    $i = 0;
    $rows = $queryResults->rows();
    foreach ($rows as $row) {
        printf('--- Row %s ---' . PHP_EOL, ++$i);
        foreach ($row as $column => $value) {
            printf('%s: %s' . PHP_EOL, $column, $value);
        }
    }
    printf('Found %s row(s)' . PHP_EOL, $i);
} else {
    throw new Exception('The query failed to complete');
}

<?php
$text = 'https://www.blog.org is an interesting blog,
https://google.com/ is the search engine more used,
//www.twiter.com is a broken URL, https://colombia.travel
is to get information about Colombia, http://example.club
is an insecure website and, HTTPS://EXAMPLE.COM is an incorrect
URL because it is in uppercase.';

preg_match_all(
    "/\bhttps?:\/\/(?:www\.)?[a-z]+\.[a-z]{1,6}\b\/?/",
    $text,
    $result
);
foreach ($result[0] as $value) {
    echo $value . "\n";
}

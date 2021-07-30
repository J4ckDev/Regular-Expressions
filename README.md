# Regular Expressions <!-- omit in toc -->

Regular Expressions are patterns used to match string combinations, usually to validate information written in different forms. E.g., A string pattern to identify the email format in a contact form.  
Other uses for regular expressions include looking for a pattern to replace strings or extract data. 

## Table of Contents <!-- omit in toc -->
- [How to declare a regular expression (regex)?](#how-to-declare-a-regular-expression-regex)
  - [Metacharacters](#metacharacters)
  - [Modifiers](#modifiers)
  - [Examples](#examples)
  - [Example with Javascript](#example-with-javascript)
  - [Example with PHP](#example-with-php)
- [More to learn](#more-to-learn)

## How to declare a regular expression (regex)?

To make a declaration is necessary to write the regex between a pair of slashes (/), and depending on our need, we can add modifiers at the end of the declaration. E.g., If we have the next text:
> A housewife stays in a house all the time.

And using the regex `/house/g`, we can get two matches with the **house** pattern.
>  A ***house***wife stays in a ***house*** all the time.

With this in mind, I will explain the most common patterns and modifiers for making more complex regular expressions. You can use **[this website](https://regex101.com/)** to test the regular expressions presented in this guide or to creating and test your own. 

### Metacharacters
As you saw above, a pattern is a text between a pair of slashes, but you can define more complex patterns applying the next metacharacters:

|Metacharacter|Description|
|:--------:|-----------|
|`[]`|When you need define a group or range of letters, symbols, and or numbers, write the characters of your interest between the brackets.|
|`()`|Use this metacharacter to define groups and capture other data. You can add `?:` after the first parentheses to ignore the values obtained.|
|`\|`|Matches either what is before the `\|` or after it.|
|`\w`|Matches alphanumeric characters or with the underscore. An alternative form to see this metacharacter using brackets is `[A-z0-9_]`.|
|`\d`|Matches a digit (equal to `[0-9]`). |
|`^`|Matches the characters defined at the start of a string.|
|`$`|Matches the characters defined at the end of a string.|
|`.`|Matches with everything.|
|`\.`|When you need write a dot in your pattern, use this metacharacter.|
|`*`|Matches zero or unlimited times|
|`+`|Matches one or unlimited times.|
|`?`|Matches a character if exists or not.|
|`\b`|Matches with a number, letter, group, or underscore defined at the start of a word, at the end, or both cases.|
|`{n}`|Matches `n` times.|
|`{n,m}`|Matches from `n` to `m` times.|

In the section [More to learn](#more-to-learn) you can find more about the metacharacters.

### Modifiers
The modifiers could be one letter or a combination of letters declared at the end of the last slash for specifying how the pattern must be applied, in a few words, define the regex behavior in a text. In the next table, you can see some of them:

|Modifier|Description|
|:--------:|-----------|
|`g`|Use the **g**lobal modifier when you need to find all pattern matches in a text.|
|`i`|If you want the pattern to be case **i**nsensitive, use this modifier.|
|`m`|When you have a **m**ulti-line text, use this modifier with the metacharacter `^` and `$`. |

In the section [More to learn](#more-to-learn) you can find other modifiers.

### Examples
To show you how to use and combine the different metacharacters and modifiers presented previously, I have solved the next regex exercises:

1. Given the following text, make a regex to get all number formats ignoring the video quality value.  
   
   > This text has random numbers, 125.25 and -1,101,045,521.12 are float numbers; 1.5899e23 and 10e8 are in scientific format; the numbers 3,340 and -562 are integers, and 720p is a video quality value.

    To solve this problem, I recommend following these steps:

    1. Identify the problem context. As you could observe, the numbers have been write as words in a paragraph, and it's necessary to match all number formats. Thus, the regex can start with `/\b\b/g`.
    2. Separate the terms you need to match and analyze them. In this case, make a list with the number formats given in this problem and see the things in common.
        ```
        125.25 
        -1,045,521.12
        1.358909e23
        10e8
        3,340
        -562
        ```
        After viewing the list, you can conclude that:
        - The numbers greater than 999 have a comma.
        - The numbers with decimals have a dot as the decimal point.
        - The numbers in scientific format have the letter **e** in numbers with or without decimals.
        - The negative numbers have the hyphen as the minus sign. 
    3. Write the pattern from the analysis made previously. In this case, the pattern needs have:
        - An optional hyphen at the pattern beginning.
        - Identify the first group of numbers.
        - Create a group to see after the first group of numbers exists a comma with more numbers.
        - Create a group to represent the numbers with a decimal point with an optional e or numbers without a decimal point but with e.
        - Close the pattern with digits to avoid a match with the video quality value.
    4. Last, build the regex with the needs previously defined. You can see the parts of this pattern below:
       - `-?` represents the optional hyphen.
       - `\d+` id for the first group of numbers.
       - `(,\d+)*` to see if exist a comma with more numbers to identify the numbers greater than 999.
       - `\.\d+(e\d+)` for the numbers with the decimal point with and optional e.
       - `e\d+` for the numbers without the decimal point but with e.
    
    The regex obtained with all parts together is `/-?\b\d+(,\d+)*(\.\d+(e\d+)?|e\d+)?\b/g` and you can see [here](https://regex101.com/r/hfIXem/1) how works.

2. Validate an IPv4 address. The addresses are four numbered separated by three dots and can only have a maximum value of 255 in either octet. You can find a list with correct and incorrect IP addresses below:
    ```
    Correct IP addresses
    172.16.254.1
    255.2.0.1
    223.0.1.67
    0.56.89.1
    23.56.47.10
    0.0.0.255
    255.255.255.255
    204.2.2.3
    1.5.8.4

    Incorrect IP addresses
    192.168.0.256
    256.56.78.78.45
    500.54.54.85
    500
    255.23
    256.0.1
    3...3
    192.168.000.1
    00.2.5.4
    000.5.6.7
    ١٢٣.१२३.೧೨೩.๑๒๓
    ```
    Like in the first example, follow the next steps: 

    1. Identify the problem context.
    2. Separate the terms you need to match and analyze them.
    3. Write the pattern from the analysis made previously. 
    4. Last, build the regex with the needs previously defined.

    As you see above, I don't explain the step by step of this example because I want to leave you a little work to understand why `/^(?:(?:25[0-5]|(?:2[0-4]|1[0-9]|[1-9]|)[0-9])(?:\.(?!$)|$)){4}$/gm` match perfectly with the requirement, but I leave you some clues of the regex below.

    -  The lenght of each octet is from *1 to 3 numbers*.
    -  The range of each octet is from *0 to 255*.
    -  The list could see as a multiline text.
    -  Use the metacharacter `?!` to match someting not following by something else. [Read this to know more](https://www.regular-expressions.info/lookaround.html).
    
    You can see the regex working [here](https://regex101.com/r/A0dvvZ/1/).

### Example with Javascript
To illustrate how to define regular expressions in Javascript, I have created a little example where the social network name begins with `@` and in a match is replaced by a direct link. The paragraph and the javascript code are below:

```html
<p>Three of the top social networks are @Facebook, @Twitter and @Youtube.</p>
```

```javascript
window.onload = () => {
    const regex = /@[A-z]+/g;
    const p = document.querySelector("p");
    let paragraph = p.innerText;
    const result = paragraph.match(regex);

    result.forEach((value) => {
        let temp = value.split("@")[1];
        paragraph = paragraph.replace(value, `<a href="https://www.${temp}.com" target="_blank">${temp}</a>`);
    });

    p.innerHTML = paragraph;
};
```

As you could observe, to match a regex only is necessary create a constant that saves the regex (`const regex = /@[A-z]+/g;`) and other constant to save all matches (`const result = paragraph.match(regex);`).

You can find the file of this example [here](./examples/index.html).

### Example with PHP 
The last example is to match all correct URLs and display them in the console. The paragraph used in this example is the following:

>`https://www.blog.org` is an interesting blog, `https://google.com/` is the search engine more used, `//www.twiter.com` is a broken URL, `https://colombia.travel` is to get information about Colombia, `http://example.club` is an insecure website and, `HTTPS://EXAMPLE.COM` is an incorrect URL because it is in uppercase.

The code generated to solve this example is:

```php
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
```

In PHP, the modifier `g` is not necessary because the function used already search in all text; the rest of the regex has the things explained in this introduction to regular expressions.

You can find the file of this example [here](./examples/regex.php).

## More to learn
Now your work is practicing and visiting the following websites to learn more about the regular expressions:

1. [All about regular expresions](https://www.regular-expressions.info/)
2. [RegexOne - Learn regex with exercises](https://regexone.com/)
3. [Meta characters in regular expresions](https://www.ibm.com/support/knowledgecenter/en/SSSH5A_9.0.1/com.ibm.rational.clearquest.schema.ec.doc/topics/sch_pkgs/r_emp_regexpmetachars.htm)
4. [Javascript Regular Expresions](https://www.w3schools.com/js/js_regexp.asp)
5. [Match method in Javascript](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/match)
6. [PCRE regex syntax - PHP](https://www.php.net/manual/en/reference.pcre.pattern.syntax.php)
7. [PCRE Functions - PHP](https://www.php.net/manual/en/ref.pcre.php)

# Regular Expressions <!-- omit in toc -->

Regular Expressions are patterns used to match string combinations, usually to validate information written in different forms. E.g., A string pattern to identify the email format in a contact form.  
Other uses for regular expressions include looking for a pattern to replace strings or extract data. 

## Table of Contents <!-- omit in toc -->
- [How to declare a regular expression (regex)?](#how-to-declare-a-regular-expression-regex)
  - [Metacharacters](#metacharacters)
  - [Modifiers](#modifiers)
  - [Examples](#examples)
- [Regex with Javascript](#regex-with-javascript)
- [Regex with PHP](#regex-with-php)
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
|`()`|Use this metacharacter to define different groups for a pattern separated by a vertical bar (`|`).|
|`\w`|Matches alphanumeric characters or with the underscore. An alternative form to see this metacharacter using brackets is `[A-z0-9_]`.|
|`\d`|Matches a digit (equal to `[0-9]`). |
|`^`|Matches the characters defined at the start of a string.|
|`$`|Matches the characters defined at the end of a string.|
|`\b`|Matches the characters defined at the start and the end of a word.|
|`*`|Matches zero or unlimited times|
|`+`|Matches one or unlimited times.|
|`?`|Matches a character if exists or not.|
|`{n}`|Matches `n` times.|
|`{n,m}`|Matches from `n` to `m` times.|

In the section [More to learn](#more-to-learn) you can find more about the metacharacters.

### Modifiers
The modifiers could be one letter or a combination of letters declared at the end of the last slash for specifying how the pattern must be applied, in a few words, define the regex behavior in a text. In the next table, you can see some of them:

|Modifier|Description|
|:--------:|-----------|
|`g`|Use the **g**lobal modifier when you need to find all pattern matches in a text.|
|`i`|If you want the pattern to be case **i**nsensitive, use this modifier.|
|`m`|When you have a **m**ulti-line text, use this modifier with the metacharacter `^` or `$`. |

In the section [More to learn](#more-to-learn) you can find other modifiers.

### Examples

## Regex with Javascript
## Regex with PHP
## More to learn

1. [RegexOne - Learn regex with exercises](https://regexone.com/).
# Regular Expressions

Regular Expressions are patterns used to match string combinations, usually to validate information written in different forms. E.g., A string pattern to identify the email format in a contact form.  
Other uses for regular expressions include looking for a pattern to replace strings or extract data. 

## How to declare a regular expression (regex)?

To make a declaration is necessary to write the regex between a pair of slashes (/), and depending on our need, we can add modifiers at the end of the declaration. E.g., If we have the next text:
> A housewife stays in a house all the time.

And using the regex `/house/g`, we can get two matches with the **house** pattern.
>  A ***house***wife stays in a ***house*** all the time.

With this in mind, I will explain the most common patterns and modifiers for making more complex regular expressions. You can use **[this website](https://regex101.com/)** to test the regular expressions presented in this guide or to creating and test your own. 
### Patterns

### Modifiers
# GetStrMatching in PHP

## Description

You can get how much similar $str1 and $str2 are.
This function returns whether one string(which is shorter) is an abbreviation for the other(longer) and how much characters of one string exists in the other string.

## Usage

Example 1.
`echo getStrMatching("by the way", "btw")`
The result is
`1`

Example 2.
`echo getStrMatching("by the way", "btway")`
The result is also
`1`

Example 3.
`echo getStrMatching("By the way", "btway")`
The result is
`0.8`
Because "b" is not used in "By the way"

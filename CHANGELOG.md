[<< Go back to home](https://github.com/SerhiiCho/short-number/blob/master/README.md)

# Release Notes

----

## v3.0.0 (2022-01-27)

- Added `CHANGELOG.md` file;
- Removed ability to pass option `Option::UPPER` as the second argument to `conv` method;

----

## v2.0.3 (2021-03-16)

- Added support for php 8 in composer.json file;

----

## v2.0.2 (2020-12-06)

- Added phpstan;
- Added phpcs;
- Added ability to overwrite any amount of fields, not just 4 fields;
- Refactored code;

----

## v2.0 (2020-12-05)

- Renamed `Conv` class to `Number`;
- Renamed `short()` method to `trans()`;
- Added support for Ukrainian language;
- Added easy way to contribute new language support;
- Improved documentation;
- Added **CONTRIBUTE.md** file with instructions how to contribute language support;
- Fixed bug when you couldn't convert negative numbers;
- Added ability to overwrite translations by passing array to `Lang::set()` method as the second argument;
- Changed string options with constants;
- Changed default case to lowercase instead of uppercase;
- Added more tests;
- Added php8 to github actions CI;

----

## v1.1.1 (2020-11-17)

- Added MIT license;

----

## v1.1 (2019-12-31)

- Changed namespace for tests;
 
----

## v1.0.1 (2019-12-16)

- Changed first parameter type in `short()` method in `Conv.php`;

----

## v1.0 (2019-12-16)

- First version;

----

[<< Go back to home](https://github.com/SerhiiCho/short-number/blob/master/README.md)

# User faker

**User Facker** is a library that helps to generate test data for the user, such as name, email, phone number and avatar based on gender or nationality

## Install
Via Composer

`$ composer require pelukho/userfaker`
and dont forget about `require_once __DIR__ . '/vendor/autoload.php';` in your bootstrap file

## Usage
**Basic array usage**

You can not pass parameters, then each time there will be a user of a different country and gender

`$fakeUser = new UserFaker();`

You can pass _male_, _female_ or _m_, _f_

`$fakeUser = new UserFaker("m");`

You can pass nationality. Available nationality: AU, BR, CA, CH, DE, DK, ES, FI, FR, GB, IE, IR, NO, NL, NZ, TR, US

`$fakeUser = new UserFaker("m", "de");`

If you need only name of some country, pass first parameter as null

`$fakeUser = new UserFaker(null, "de");`

To get full name `$fakeUser->getUserFullName();`

Only name `$fakeUser->getUserName();`

Only surname `$fakeUser->getUserSurname();`

Get user email `$fakeUser->getUseremail();`

Get user thumbnail, you can pass size: 'large' - 128 * 128, 'medium' - 72 * 72, 'thumbnail' - 48 * 48, - thumbnail by default

`$fakeUser->getUserThumbnail();`

Get user phone in format 000-000-0000 `$fakeUser->getUserSellPhone();`

### Copyright Notice

All randomly generated photos were hand picked from the authorized section of [UI Faces](http://uifaces.com/). Please visit [UI Faces FAQ](https://web.archive.org/web/20160811185628/http://uifaces.com/faq) for more information regarding how you can use these faces.

## License

The MIT License (MIT). Please see [License File](https://github.com/zzinsidezz/pelukho-userfaker/blob/master/LICENSE) for more information.
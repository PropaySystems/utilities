# Contributing

## Before you start

Please, make sure you have taken a look on [our documentation](https://docs.propay.co.za/).

If there is a problem with one of ours components? The best way to reach us is to
open a new issue, we just ask you to search if your problem was discussed before
and if so continue the discussion there.

Want to submit a new pull request? Let us know what you're planning to work opening a
new issue this will prevent that we're working on the same thing. We'll be very happy
to discuss and review your code.

## Installing

To clone the project source and install its dependencies, run:

```shell
git clone git@github.com:PropaySystems/utilities.git
cd utilities

composer install
yarn install
```

To run the project test make sure you have installed the chromium-browser and run:

```shell
composer test
```

Now you can work on the project. We're using a code standard to format our code
so before send your PR make sure that you run ` composer phpcs `.

## Work on a local project with the project source

After installing the projects using the steps above you can create a brand new laravel
project and add to the composer.json:

```json
    ...,
    "repositories": {
        "local": {
            "type": "path",
            "url": "../path/to/utilities"
        }
    }
}
```

After added this configuration you can install the laravel-base-repositories project as a local dependency
using ` composer require propaysystems/utilities `, so when you change the laravel-base-repositories source code
it will be reflected on your laravel package.

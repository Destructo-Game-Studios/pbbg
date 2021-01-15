# Contributing

## Issues & Pull Requests

* Communicate in English on issues and pull requests.
* Pull requests should only contain related changes.
* Your code should be covered by unit tests.
* All checks must pass before your code is merged.
    * Before submitting your PR run `npm run all-scripts` or `composer run-script all-scripts` and verify that all checks pass correctly.

### Running Tests

All scripts can be run with NPM or Composer. Script names are the same for both.

#### all-scripts

`all-scripts` is a master command that collects all of our checks and runs them one after the other. This is primarily used for Continuous Integration, but you should also run this directly before submitting a PR to verify there are no failures.

#### unit

`unit` will run the full suite of PHPUnit tests. You can also run this with access to all commands by running `./vendor/bin/phpunit`

#### analyzer

`analyzer` will execute Psalm. You can run this manually by running `./vendor/bin/psalm`

#### mutation

`mutation` will execute Infection PHP. You can run this manually with `./vendor/bin/infection`.

For CI purposes, Infection tests must be a minimum MSI of 90, and a minimum covered MSI of 90.

---

Once your code is merged, it is available to everybody, for free, under the [MIT License](/LICENSE).
By publishing your pull request on the PBBG project, you implicitly agree with the aforementioned license.

**Thank you for your contribution! PBBG wouldn't be so great without you.**
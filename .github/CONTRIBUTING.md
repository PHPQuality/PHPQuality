# CONTRIBUTING

We are using [GitHub Actions](https://github.com/features/actions) as a continuous integration system.

For details, see [`workflows/continuous-integration.yml`](workflows/continuous-integration.yml).

## Coding Standards

Run

```
$ make cs
```

to automatically fix coding standard violations.

## Static Code Analysis

Run

```
$ make stan
```

to run a static code analysis.

## Tests

Run

```
$ make test
```

to run all the tests.

## Mutation Tests

Enable `Xdebug` and run

```
$ make infection
```

to run mutation tests.

## Extra lazy?

Run

```
$ make
```

to enforce coding standards, perform a static code analysis, and run tests!

:bulb: Run

```
$ make help
```

to display a list of available targets with corresponding descriptions.

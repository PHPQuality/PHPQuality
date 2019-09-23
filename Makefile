help: # here so that `make` runs the help command

.PHONY: all
all: cs stan test ## Runs the cs, stan, and test targets

.PHONY: coverage
coverage: vendor ## Collects coverage from running unit tests with phpunit
	mkdir -p .build/phpunit
	vendor/bin/phpunit --configuration=test/Unit/phpunit.xml --dump-xdebug-filter=.build/phpunit/xdebug-filter.php
	vendor/bin/phpunit --configuration=test/Unit/phpunit.xml --coverage-text --prepend=.build/phpunit/xdebug-filter.php

.PHONY: cs
cs: vendor ## Fixes code style issues with php_cs
	vendor/bin/phpcbf

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: infection
infection: vendor ## Runs mutation tests with infection
	mkdir -p .build/infection
	vendor/bin/infection --ignore-msi-with-no-mutations --min-covered-msi=90 --min-msi=90

.PHONY: stan
stan: vendor ## Runs a static analysis with phpstan & psalm
	mkdir -p .build/phpstan
	vendor/bin/phpstan analyse --configuration=phpstan.neon
	vendor/bin/psalm

.PHONY: test
test: vendor
	vendor/bin/phpunit

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress --no-suggest
	composer normalize

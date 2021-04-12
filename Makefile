.PHONY: qa dev cs cfx phpstan tests build

qa: cs phpstan

cs:
	vendor/bin/codesniffer app

cfx:
	vendor/bin/codefixer app

phpstan:
	echo "OK"

tests:
	echo "OK"

tests-coverage:
	echo "OK"

#####################
# LOCAL DEVELOPMENT #
#####################

dev:
	NETTE_DEBUG=1 NETTE_ENV=dev php -S 0.0.0.0:8000 -t www

spa:
	npm run dev

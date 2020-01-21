# Chip Technical Test
* PHP 7.4

## Environment File
Please create a `.env` file at the root of project from a copy `.env.dist`, this environment file contains the file
name used to assign a name and version for our console app. If this is not provided application uses the default value.

    ~$: cp .env.dist .env


## Architecture
I have utilised PSR 1/2 and Symfony coding guidelines to produce this solution. App is created using Domain-Driven Design
(Rich Domain Model) with latest OOP features of PHP7+ and implementation of SOLID principles. Dependencies, injected into
the Core Domain via Ports and Adapters Architecture, please read the `README.md` file inside the `Adapter` directory.


## Tests
I have used TDD approach for creation of most of components, please check the tests folder for the relevant tests. Test are
separated according to **Test Pyramid** principles. Unit tests and service test run in order of pyramid. However, I also used
Mutation testing which I could assume that could run after service.


## Run on Local Host Machine
Please ensure you have a PHP 7.4 installed on your host machine if not you could use the docker implementation in this
project.

To run the application please install all dependencies via:

    ~$: composer install

and then run the executable bash script at the root of the project:

    ~$: ./beesinthetrap

In order to run the linting and tests

    ~$: composer deploy


## Run using Docker & Makefile
Please ensure use following to build and up the PHP 7.4 container:

    ~$: make up

To run the application inside the container please run the following:

    ~$: make run


In order to run the tests and lints inside the PHP container please run the following:

    ~$: make test

rest of the make commands created solely for purpose of development such as: `make ssh`


### License
Creative Commons Attribution-NonCommercial-NoDerivs *CC BY-NC-ND*

<img src='https://licensebuttons.net/l/by-nc-nd/3.0/88x31.png' alt='CC BY-NC-ND'>
# CovidCentral

CovidCentral is a Symfony website to deal with the Covid-19 news. By this app / website, you'll be able to pass a test to know if you could have contract the Covid-19 virus.<br/>
Also, you can have an access to some usefull links as the attestation, documents, good tips... <br/>
Last, you can answer to a pool if you wan't: your feedback can help scientists !

## Installation and usage

First, make sure you have well installed [Yarn](https://yarnpkg.com/), [composer](https://getcomposer.org/) and [nodeJS](https://nodejs.org/en/) on your computer.

You can download or directly clone this repo:

```bash
git clone https://github.com/Bran72/covidcentral.git
```

Next, you only have to go in the project root folder and starting it with:

```bash
symfony server:start
```

The website is accessible on your local network: ``https://127.0.0.1:8000/``

## Developing

If you wan't to edit some things, you must run the next command to be able to see your SCSS changes:

```bash
yarn encore dev --watch
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
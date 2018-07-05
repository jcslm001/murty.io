[murty.io](https://murty.io)
=======

[![Brendan](/images/brendan/brendan_murty.jpg)](https://murty.io/brendan) [![Ella](/images/ella/ella_condon.jpg)](https://ellacondon.com/) [![Isla](/images/isla/isla_murty.jpg)](https://murty.io/isla) [![BabyX](/images/babyx/babyx_murty.jpg)](https://murty.io/babyx)

## About

Here's the [Murty website](https://murty.io) built with [Angular](https://angularjs.org/), [Express](https://expressjs.com/) and [Feather](http://feathericons.com) icons.

## Why

I was inspired by [Brad Frost](https://github.com/bradfrost)'s [TED talk](https://twitter.com/brad_frost/status/476515058738925568) about being open by default. If you haven't seen this talk yet, I'd recommend investing half an hour to [watch the video](https://www.youtube.com/watch?v=7rW9vTrN6OU) and read the [blog post](http://bradfrostweb.com/blog/post/creative-exhaust/).

As I'm self-taught, engaging with the [community](https://twitter.com/brendanmurty/lists/development/members), [listening to inspirational people](http://boagworld.com/show) and [reading about new techniques](https://signalvnoise.com/programming) helped me turn my passion in to my career.

I hope a budding web developer can learn something new from what I've done here and start their own career. Hopefully I can give back to the community that has taught me so much over the last few years.

## Setup

First you'll need to install [Node.js and NPM](https://nodejs.org/en/download/).

Then Git Clone the repo in to a suitable directory, such as `/var/www/murty.io`.

To install the required packages and configure the environment, run these commands from the cloned directory:

```
npm install -g bower gulp-cli nodemon forever && npm install
touch ~/.forever/murty-forever.log && touch ~/.forever/murty-output.log && touch ~/.forever/murty-error.log
```

When using Ubuntu, you'll need to put `sudo ` in front of the first command above.

### SSL Configuration

To setup SSL using [Let's Encrypt](https://letsencrypt.org/):

```
sudo apt-get install letsencrypt
letsencrypt certonly --webroot -w ./ -d your-domain.com
```

Then copy the resulting `fullchain.pem` and `privkey.pem` files in to the `ssl` folder.

To renew the SSL certificate, run:

```
letsencrypt certonly
```

Then select the *renew* option in the prompt and copy the resulting `fullchain.pem` and `privkey.pem` files in to the `ssl` folder.

### Logs

To view a live history of the logs, run one of these commands:

```
npm run logerror
npm run logoutput
npm run logserver
```

### Maintenance

To clear the Posts and Feed JSON cache files, run:

```
npm run clearcache
```

To regenerate the Posts and Feed JSON cache files locally, run:

```
npm run generatejsondev
```

To regenerate the Posts and Feed JSON cache files on production, run:

```
npm run generatejson
```

### Development

To update JavaScript and CSS build files run: `gulp`

To start a development web server run:

```
npm run startdev
```

When using Ubuntu, you need to put `sudo ` in front of the second command above.

### Production

To start a production web server run:

```
npm run start
```

To stop a production web server run:

```
npm run stop
```

## Contribute

If you have an idea for a website update or have found a bug, please [add to the Trello board](https://trello.com/b/ag7rb8Hk/murtyio).

## License

You can view the [License](https://github.com/brendanmurty/murty.io/blob/master/license.md) file for rights and limitations when using the code here in your own projects.

The license is based on the [CSS-Tricks License](https://css-tricks.com/license/) which was created by [Chris Coyier](https://github.com/chriscoyier/).

+++
title = "چگونه بلاگ زولا را در github pages دیپلوی کنیم؟"
date = "1403-03-17"
description = "برای یکی از کاربران پروژه ما گفته است که چطوری بلاگ زولا را در github pages دیپلوی کنیم؟ در این پست به این سوال جواب خواهیم داد"
+++
برای یکی از کاربران یک سوالی پیش آمد. گفتن چطوری بلاگ زولا خود را در github-pages دیپلوی کنیم؟ بسیار ساده است

ما در این پروژه پیشنهاد میکنیم از [Zola deploy](https://github.com/st1020/zola-deploy)

خب توی پروژتون یه فولدر درست کنین به اسم .github

توی فولدر .github یه فولدر بسارین به اسم workflows

توی اون فولدر یه فایل بسازین به اسم zola-deploy.yml

کد زیر رو توش قرار بدین

```
name: Publish on GitHub Pages

on:
  push:
    branches:
      - master

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
        with:
          submodules: true

      - name: Upload Pages artifact
        uses: st1020/zola-deploy@v1

  deploy:
    needs: build

    permissions:
      pages: write
      id-token: write

    environment:
      name: github-pages
      url: ${{ steps.deployment.outputs.page_url }}

    runs-on: ubuntu-latest
    steps:
      - name: Deploy to GitHub Pages
        id: deployment
        uses: actions/deploy-pages@v4
```

# Usage
How to use kita 

learn it

## Install
Read prev post for install
## Requirements
- Zola blog
## Zola blog installation
### Arch/Manjaro
```
sudo pacman -S zola
```
### Ubuntu/Debian
```
sudo snap install zola --edge
```
### Windows
- Go to zola release page
- Download it
- Extract it
- Run it
## Serve persian kita
- Go to cloned directory
Run it this command
```
zola serve
```
## Delete default posts
All posts saved at content/ directory

please don't delete pages directory at content/
## Write first post
For write first post use it like
```
name = "پست من"
date = "1403-03-13"
description = "اولین پست در این بلاگ"
```
**Note**: Please use persian date 
## Get rss from your blog
```
zola build
```
The rss feed name is atom.xml
## Setup comment system
- Go to [Giscus](https://giscus.app)
- Set up to you repository
- Go to config.toml and enter you giscus data
## Setup project page
- Go to content/pages/projects/data.toml
### Example
```
[[project]]
name = "لورم"
desc = "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد."
tags = ["لورم"]
links = [
    { name = "گیت هاب", url = "https://example.com" },
    { name = "داکیومنت", url = "https://example.com" },
]
```
## Setup tags page
When you add a tag to you blog post. This page was add automatically
### Add tag to post
```
name = "Post"
date = "1403-03-13"
description = "Hello world"
[taxonomies]
tags = ["Hello world"]
```
## Setup about page
- Go to content/pages/about.md
### Example
```
+++
title = "درباره ما"
path = "about"
+++

کیتا یک تم چینی برای بلاگ ساز حرفه ای زولا است بسیار زیبا و ساده ما در این پروژه کیتا را به کیتا ی فارسی تبدیل کردیم. فعالیت این پروژه از سال ۱۴۰۳ شروع شده و فکر نکنم فعلا تمومش کنم 🤔
```
**DO NOT CHANGE PATH VARIABLE**
## Setup post page like instagram
- Go to content/pages/post/data.toml
### Example
```
[[post]]
image = "https://github.githubassets.com/assets/GitHub-Mark-ea2971cee799.png"
description = "یه پست توی بلاگ نوشتم به اسم نکته جالب در مورد کیتا حتما بخونید"
```
## Notice
- When you setup the comment section. automatically add Chat page
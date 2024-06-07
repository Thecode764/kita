from yachalk import chalk
print(chalk.bold("\nFeatures: "))

print(chalk.bg_blue_bright("""
    Easy to use and modify
    No preset limits (This theme does not limit your content directory structure, taxonomy names, etc. It's applicable to all zola sites.)
    Dark mode
    Responsive design
    Social icons
    Taxonomies support
    Projects page
    Archive page
    Table of Content
    Admonition shortcode
    SEO friendly
    Comments using Giscus
    Mathematical notations using KaTeX
    Diagrams and charts using Mermaid
"""))

print(chalk.bg_black("\nGithub:") + chalk.underline.bold.bg_cyan(" https://github.com/Thecode764/kita"))

print(chalk.bg_blue("Website:") + chalk.underline.bold.bg_gray(" https://thecode764.github.io/Kita-website"))

print(chalk.bold("\nFor others visit github"))

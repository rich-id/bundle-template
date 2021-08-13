#!/usr/bin/env bash

echo "Please enter the name of the bundle (ex: AwesomeThing): "
read name

name_uppercase=`echo "$name" | sed 's/\([a-z0-9]\)\([A-Z]\)/\1_\L\2/g' | tr '[:lower:]' '[:upper:]'}`
name_with_underscore=`echo "$name" | sed 's/\([a-z0-9]\)\([A-Z]\)/\1_\L\2/g' | tr '[:upper:]' '[:lower:]'}`
name_with_dash="${name_with_underscore/_/-}"

echo ""
echo "Migrating files"

# Change file name
mv src/RichIdTemplateBundle.php "src/RichId${name}Bundle.php"
mv src/DependencyInjection/RichIdTemplateExtension.php "src/DependencyInjection/RichId${name}Extension.php"

# Replace all strings
find . -type f -not -path "./.git/*" -exec sed -i "s/template-bundle/${name_with_dash}-bundle/g" {} +
find . -type f -not -path "./.git/*" -exec sed -i "s/rich_id_template/rich_id_${name_with_underscore}/g" {} +
find . -type f -not -path "./.git/*" -exec sed -i "s/Template/${name}/g" {} +
find . -type f -not -path "./.git/*" -exec sed -i "s/template/${name_with_underscore}/g" {} +
find . -type f -not -path "./.git/*" -exec sed -i "s/TEMPLATE/${name_uppercase}/g" {} +

# Replace Readme
rm ./README.md
mv ./README.dist.adoc README.adoc

# Generate png logo
inkscape -z -w 512 -h 512 .github/logo.svg -o .github/logo.png

# Delete script
rm ./start.sh

# Output message
echo ""
echo "The bundle is almost ready!"
echo "Please do the following actions right now:"
echo "- Add the Secret \`COVERALLS_SECRET\` in the Github Actions, you can get it here: https://coveralls.io/repos/new"
echo "- Add the bundle to Code Climate quality tool and update its badge: https://codeclimate.com/dashboard"
echo "- Make your first commit and push it"
echo "- AFTER: Declare your new package in Packagist: https://packagist.org/packages/submit"

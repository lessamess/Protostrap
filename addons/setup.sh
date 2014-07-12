#!/bin/sh

## Place this file inside the Document Root folder of your web server

clear

# Get Protostrap
echo "\n\n"
read -p "      Project Name: " name
curl -LOk  https://github.com/liip/Protostrap/archive/master.zip && unzip master.zip
mv Protostrap-master $name

clear

# Setup git?
echo "\n\n"
read -p "      Setup Github Repository? y/n: " gitaufsetzen
if [ "$gitaufsetzen" == "y" ]  ; then

    #  Copy password to clipboard
    #   -> THIS IS A HACK - PLEASE TAKE NOTE
    #
    #  Github will ask you for your password to set up the repository.
    #  The following command will copy the text in quotation marks to the clipboard.
    #  When asked for your credentials type CMD+V
       echo "YOUR-GITHUB-PASS" | pbcopy

    clear
     cd $name
     git init
     git add .
     git commit -m "Initial commit"

    #change USERNAMR
    curl -u 'USERNAME' https://api.github.com/user/repos -d '{"name": "'$name'"}'
    # Remember replace USER with your username and REPO with your repository/application name!
    git remote add origin git@github.com:USERNAME/$name.git
    git push origin master
    cd ..
fi

clear

#setup sublime?
echo "\n\n"
read -p "      Setup Sublime Project? y/n: " sublime
if [ "$sublime" == "y" ]  ; then

    cat <<EOF >$name.sublime-project
  {
        "folders":
        [
                {
                        "path": "$PWD/$name"
                }
        ]
}
EOF

/Applications/Sublime\ Text.app/Contents/SharedSupport/bin/subl $PWD/$name
fi
open http://localhost/$name

echo "\n\n"
echo "      Done."
echo "\n\n"
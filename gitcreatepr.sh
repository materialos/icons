# https://github.com/github/hub
# Must be ssh cloned
cd /var/www/materialos.com/public_html/uploads/icons/

author=$1
note=$2
nospaceauthor=${author//[[:blank:]]/}


mkdir "$author"
cd "./$author/"
mkdir Vector Raster "Raster Editor"
mv *.ai ./Vector
mv *.SVG ./Vector
mv *.sketch ./Vector
mv *.XCF ./"Raster Editor"
mv *.PSD ./"Raster Editor"
mv *.png ./Raster

cd ..

tyme=`date +%Y%m%d%H%M%S`
git checkout -b $nospaceauthor$tyme
git add *
git commit -m "Added some icons by $author! Thanks $author!"
git push --set-upstream origin $nospaceauthor$tyme
hub pull-request -m "Added some icons by $author! Thanks $author!

$note" -b materialos:master -h autocontribute:$nospaceauthor$tyme

git checkout master
git fetch --all
git reset --hard origin/master
git pull
git remote add upstream https://github.com/materialos/Icons/
git fetch upstream
git checkout master
git merge upstream/master
git push
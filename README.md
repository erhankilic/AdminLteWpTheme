# AdminLteWpTheme
-----------------
Admin Lte Wordpress Theme

**AdminLteWpTheme** is a wordpress theme based on **[AdminLTE](https://github.com/almasaeed2010/AdminLTE)**.

**Live Preview on [Idea Software](https://ideayazilim.net)**

# Installing
------------

1- "bower install"

You must have bower installed for installing the requires.

2- Create a folder at your website "wp-content/themes/" dir.

3- Upload the files there.

4- Make active theme from admin panel.

# Notes
-------
If you're using multilanguage, you must hardcode thi admin url at pages ajax request.
Because of admin url will be like http://yourwebsite.com/tr/wp-admin/. For example an index.php;

function loadArticle(pageNumber){
            $('a#inifiniteLoader').show('fast');
            $.ajax({
                **url: "http://yourwebsite.com/wp-admin/admin-ajax.php",**
                type:'POST',
                data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop',
                success: function (html) {
                    $('li#inifiniteLoader').hide('1000');
                    $("ul.timeline").append(html);
                }
            });
            return false;
        }
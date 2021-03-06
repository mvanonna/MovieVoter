# Directory Paths
css_dir = "public/assets/css"
sass_dir = "public/assets/scss"
images_dir = "public/assets/img"
javascripts_dir = "public/assets/js"

# Preferred Syntax. Can be :scss or :sass. Defaults to :scss.
preferred_syntax = :scss

# The output style for the compiled css. One of: :nested, :expanded, :compact, or :compressed.
output_style = :compressed

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false

# Set a higher number precision, this caused issues with bootstrap scss version
# For more info about this issue, see: https://github.com/twbs/bootstrap-sass/issues/409
Sass::Script::Number.precision = 10
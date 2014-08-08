# Compile SASS files
node-sass --output-style="compressed" app/assets/sass/admin/admin.scss public/css/admin.css

# Compile CoffeeScript
coffee -w --join public/js/admin.js --compile app/assets/coffee/admin/*.coffee

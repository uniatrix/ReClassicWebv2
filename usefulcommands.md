# Stop PHP server (when needed)
# Press Ctrl+C in the terminal or use:
ps aux | grep "php -S" | grep -v grep | awk '{print $2}' | xargs kill

# Stop MySQL
brew services stop mysql

# Start MySQL again
brew services start mysql

# Access MySQL directly
mysql -uroot ragdb

php -S localhost:8000

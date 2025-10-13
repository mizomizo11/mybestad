#!/bin/bash

echo "==================================="
echo "My Bestad Hospital Setup Script"
echo "مستشفى بيستاد - سكريبت التثبيت"
echo "==================================="
echo ""

# Check if .env exists
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
    echo "✓ .env file created"
else
    echo "✓ .env file already exists"
fi

# Generate application key
echo ""
echo "Generating application key..."
php artisan key:generate 2>/dev/null || echo "⚠ Note: Run 'php artisan key:generate' manually after installing Laravel"

# Create database
echo ""
echo "Database Setup:"
echo "Please ensure your database 'mybestad' exists"
echo "You can create it with: CREATE DATABASE mybestad;"
echo ""
read -p "Press enter to continue after creating the database..."

# Run migrations
echo ""
echo "Running database migrations..."
php artisan migrate 2>/dev/null || echo "⚠ Note: Run 'php artisan migrate' manually after configuring database"

# Seed database
echo ""
read -p "Do you want to seed the database with sample data? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    echo "Seeding database..."
    php artisan db:seed 2>/dev/null || echo "⚠ Note: Run 'php artisan db:seed' manually"
fi

echo ""
echo "==================================="
echo "Setup Complete!"
echo "==================================="
echo ""
echo "Next steps:"
echo "1. Configure your database settings in .env"
echo "2. Run: php artisan serve"
echo "3. Visit: http://localhost:8000"
echo ""
echo "Admin Access:"
echo "Create an admin user in the database with is_admin=1"
echo ""
echo "Documentation:"
echo "- See README.md for full documentation"
echo "- See IMPLEMENTATION.md for implementation details"
echo ""

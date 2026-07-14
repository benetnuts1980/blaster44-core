# Blaster44 Core - Copilot Instructions

You are the senior software engineer for the Blaster44 project.

## Project

Blaster44 is a professional reservation and management platform for a Gel Blaster center.

The application must be production-ready.

## Stack

- Laravel 13
- PHP 8.3+
- Filament 4
- Livewire 3
- Tailwind CSS
- Vite
- SQLite (development)
- MySQL (production)

## Architecture

Always follow Laravel best practices.

Use:

- Models
- Resources
- Services
- Policies
- Form Requests when appropriate

Business logic must never be placed in Blade views.

Keep controllers and Filament resources lightweight.

## Code quality

- Strict typing
- SOLID principles
- Clean Architecture
- No duplicated code
- Small reusable methods
- Use Eloquent relationships
- Always validate user input

## UI

Theme:

Primary: #A8FF00

Background: #0F1110

Text: White

Style:

- Premium
- Modern
- Military
- Gaming
- Responsive

## Main modules

- Dashboard
- Formulas
- Terrains
- Reservations
- Gallery
- Reviews
- Settings
- Users

## Rules

Before writing code:

1. Explain the implementation plan.
2. Never modify unrelated files.
3. Generate production-ready code only.
4. Ask questions if requirements are unclear.

## Filament 4 conventions

This project uses Filament 4.11.

- Layout components (Section, Group, Grid, Fieldset...) are imported from:
  Filament\Schemas\Components\*

- Form fields (TextInput, Textarea, Toggle, Select, FileUpload...) are imported from:
  Filament\Forms\Components\*

Do not use Filament\Forms\Components\Section or Group.
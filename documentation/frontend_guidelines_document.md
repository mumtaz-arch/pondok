# Frontend Guideline Document for Pondok

This document outlines the frontend architecture, design principles, and technologies used in the Pondok project. It’s written in everyday language so that anyone—technical or not—can understand how the frontend is set up and why it works this way.

## 1. Frontend Architecture

### Frameworks and Libraries
- **Laravel Blade**: We use Blade templates to build our HTML views. Blade makes it easy to include reusable pieces like headers and footers.
- **Tailwind CSS**: A utility-first CSS framework that lets us quickly apply styling directly in our HTML without writing custom CSS classes.
- **Alpine.js**: A lightweight JavaScript layer for small interactions (dropdowns, toggles) without a big framework.
- **Livewire**: A full-stack framework for building reactive components on top of Blade. Livewire lets us update parts of the page without writing much JavaScript.
- **Vite**: A modern build tool that bundles our JavaScript and CSS. It delivers fast hot-module reloading in development and optimized assets in production.

### How It Supports Scalability, Maintainability, and Performance
- **Scalability**: Component-based building (with Blade and Livewire) means we can add new features by creating new components or extending existing ones.
- **Maintainability**: Tailwind CSS’s utility classes avoid long CSS files and naming conflicts. Blade components and Livewire classes keep HTML, styling, and logic organized.
- **Performance**: Vite automatically splits and minifies assets. Livewire updates only the parts of the page that change, reducing full page reloads.

## 2. Design Principles

### Key Principles
1. **Usability**: Interface elements are clear, labels are descriptive, and common actions (buttons, forms) behave consistently.
2. **Accessibility**: We use semantic HTML (proper heading order, `<button>` tags) and add ARIA attributes when needed. Color contrast meets WCAG standards.
3. **Responsiveness**: Tailwind’s responsive utilities ensure layouts adapt to mobile, tablet, and desktop screens.
4. **Simplicity**: Avoid clutter—each page focuses on one main task with clear calls to action.

### Applying These Principles
- Buttons have sufficient size and contrast for all users.
- Form fields use labels and helper text to guide input.
- Navigation is sticky or clearly visible on all screen sizes.
- Livewire and Alpine.js interactions provide instant feedback (e.g., loading spinners, validation messages).

## 3. Styling and Theming

### Styling Approach
- **Utility-First**: We use Tailwind CSS. Instead of creating custom CSS classes, we compose small utility classes directly in our markup (e.g., `px-4 py-2 bg-blue-600 text-white rounded`).
- **No Preprocessor**: Tailwind ships with PostCSS out of the box—no separate SASS or LESS files.

### Theming
- All colors, fonts, and spacing live in `tailwind.config.js` so updates apply everywhere.
- We follow Tailwind’s theming conventions: custom colors under `theme.extend.colors` and fonts under `theme.extend.fontFamily`.

### Visual Style
- **Style**: Modern flat design with subtle glassmorphism accents (light translucent panels with soft shadows).
- **Color Palette**:
  • Primary: #1D4ED8 (blue-700)
  • Secondary: #9333EA (purple-600)
  • Accent: #F59E0B (yellow-500)
  • Success: #10B981 (green-500)
  • Danger: #EF4444 (red-500)
  • Background: #F3F4F6 (gray-100)
  • Surface: #FFFFFF (white)
  • Text Primary: #111827 (gray-900)
  • Text Secondary: #6B7280 (gray-500)

### Typography
- **Font**: Inter, a clean, versatile sans-serif font imported via Google Fonts.
- **Hierarchy**: 
  • Headings: `font-semibold` with sizes from `text-2xl` down to `text-base`.
  • Body text: `text-base` or `text-sm` for secondary information.

## 4. Component Structure

### Organization
- **Blade Components**: Stored in `resources/views/components/`. Each component has its own folder if it needs multiple files (e.g., a dropdown with Blade and style partials).
- **Livewire Components**: Stored under `app/Http/Livewire/`. Each component has a PHP class and a Blade view.

### Reuse and Modularity
- Build small, focused components (e.g., `<x-button>`, `<x-modal>`, `<x-alert>`).
- Parameterize components via attributes (e.g., `<x-button color="primary">Save</x-button>`).
- Group related components in subfolders (e.g., `components/nav/` for navigation elements).

### Benefits
- **Maintainability**: Change a component once and it updates across the app.
- **Clarity**: Components self-document by name and attributes.

## 5. State Management

### Livewire
- Each Livewire component holds its own state as public PHP properties.
- Methods on the PHP class handle actions (form submissions, toggles). The component re-renders seamlessly.

### Alpine.js
- For simple, local interactions, we use Alpine’s `x-data`, `x-show`, and `x-on` directives.
- Alpine state lives in the markup and is ideal for toggles, tabs, or simple form enhancements.

### Sharing State
- Use Livewire events (`$emit`, `$on`) to communicate between components.
- Alpine can listen to Livewire events via the `@entangle` directive or custom event listeners.

## 6. Routing and Navigation

### Routing
- **Laravel Routes**: Defined in `routes/web.php`. Each route points to a Blade view or a controller action.
- **Named Routes**: We use named routes (`route('dashboard')`) to generate URLs and avoid hard-coding paths.

### Navigation Structure
- A main navigation bar component (`<x-nav>`) includes links, dropdowns, and a mobile menu.
- Breadcrumbs component (`<x-breadcrumbs>`) shows the user’s current location.

### Moving Between Pages
- Clicking a link triggers a full page load by default.
- Livewire components can update parts of the page without a full reload when used as route targets (via `@livewire` in Blade).

## 7. Performance Optimization

### Asset Optimization
- **Vite** auto-minifies and tree-shakes JS and CSS for production.
- **PurgeCSS** (built into Tailwind) removes unused CSS classes.

### Code Splitting & Lazy Loading
- Load large libraries (e.g., charts, maps) only on pages that need them via dynamic imports in `app.js`.
- Use Livewire’s `wire:loading` to show spinners only when needed.

### Images and Media
- Serve responsive images using `srcset` or Livewire’s built-in image handling.
- Leverage the Spatie Media Library for on-the-fly image conversions and optimizing delivery.

## 8. Testing and Quality Assurance

### Unit and Feature Tests
- **PHPUnit**: For backend and Livewire component tests. Livewire provides helpers to assert component behavior.
- **Test Locations**: `tests/Unit/` for pure PHP, `tests/Feature/` for HTTP and Livewire tests.

### End-to-End (E2E) Tests
- **Laravel Dusk** or **Cypress**: To automate browser tests. Validate key user flows (login, form submission, data export).

### Linting and Formatting
- **ESLint**: For JavaScript code style and error checking.
- **Stylelint**: Optional, for CSS best practices.
- **Pre-commit Hooks**: Run `npm run lint` and `npm run test` on staged files to catch issues early.

### Continuous Integration
- Set up GitHub Actions (or similar) to run tests and linting on each pull request, ensuring code quality before merging.

## 9. Conclusion and Overall Frontend Summary

Pondok’s frontend is built with a modern, flexible technology stack: Blade templates, Tailwind CSS, Alpine.js, Livewire, and Vite. Our guidelines emphasize:

- **Clarity and Reuse**: Component-driven structure makes it easy to build and maintain UI elements.
- **Performance and Responsiveness**: Vite and Tailwind optimize assets and layouts for any device.
- **User-First Design**: Accessibility and usability principles ensure all users have a smooth experience.
- **Robust Interactivity**: Alpine.js and Livewire deliver dynamic features without a heavy JavaScript framework.

Together, these practices help Pondok deliver a fast, reliable, and scalable frontend that aligns with project goals and user needs. If you’re new to the project, follow these guidelines to contribute consistently and confidently.
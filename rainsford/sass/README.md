# Rainsford — Materialize SASS build

Custom SASS build of Materialize 1.0.0. Container width and gutter are
set at the source instead of being overridden after the fact in style.css.

## Folder structure (inside the theme root)

```
rainsford/
  sass/                        <- this folder
    package.json
    materialize-sass/          <- editable Materialize source
      components/
        _variables.scss        <- $container-width-large, $gutter-width, etc.
        _grid.scss              <- .container rule, uses $container-width-large
        ... (rest of Materialize's components, untouched unless you edit them)
      materialize.scss          <- main entry point, imports every component
  css/
    materialize-custom.min.css  <- compiled output, this is what functions.php loads
```

## One-time setup

Requires Node.js (any recent LTS version) and npm.

```bash
cd wp-content/themes/rainsford/sass
npm install
```

## Rebuilding after a change

Edit anything inside `materialize-sass/components/`, then:

```bash
npm run build
```

This writes the compressed production file to `../css/materialize-custom.min.css`.
Refresh the browser (hard refresh — Cmd+Shift+R — since the file has no
cache-busting query string beyond `_S_VERSION` in functions.php; bump that
constant too if a browser stubbornly keeps the old file).

## Other scripts

- `npm run build:dev` — same build, unminified/readable, for debugging.
- `npm run watch` — recompiles automatically on every save while you work.

## What's already customized

- `$container-width-large` (in `_variables.scss`) — the `.container` max-width
  at the large breakpoint (≥993px). Currently `1400px`, matching the Figma
  reference. This replaces the manual override that used to live in style.css
  (`@media (min-width: 993px) { .container { width: 90%; max-width: 1370px; } }`)
  — that rule in style.css is now redundant and can be deleted once you confirm
  this build is live.

## Not yet touched

- `$gutter-width` (still Materialize's default, `1.5rem`) — this is the source
  of the padding some `.col` elements carry that doesn't match a clean 50%
  split in Javier's Figma. Lower it here if you want a global change across
  every `.col` on the site, or keep using the flexbox/grid overrides
  (`.about-grid`, `.why-grid`, etc.) for the specific sections that need an
  exact split — both approaches work, it's a judgment call on how much of the
  site should inherit a tighter gutter globally.
- Breakpoints (`$small-screen`, `$medium-screen`, `$large-screen`) — these
  already match the custom media queries used throughout style.css (600px,
  992px), so no change was needed there.

# Copilot Instructions

## Project Scope

This repository is an isolated PHP multipart DAST test fixture, not a production application. Keep changes focused on the local test target and its Docker Compose setup.

## Test Environment

- Publish port `127.0.0.1:8080` for local host only. Keep network firewalling in place to prevent untrusted access.
- PHP 8.4.26 is intentionally pinned as the DAST target. Do not upgrade it unless the user asks to change the test baseline.
- `memory_limit=128M` and `display_errors=On` are intentional test settings. Preserve them unless the user requests otherwise.
- Prefer the benign multipart baseline request when checking that the service works. Do not send resource-exhaustion or exploit payloads as routine validation.
- Use `docker compose up --build -d --wait --wait-timeout 30` to start and wait for health, and `docker compose down` to stop the stack.

## Changes

- Keep the existing PHP, Nginx, and Supervisor configuration consistent with the single-container Compose design.
- Avoid changing `.fortify/` or generated security artifacts unless explicitly asked.
- Do not stage or commit changes unless the user requests it.
# Contributing

Thank you for helping improve this PHP multipart DAST test fixture. Keep contributions focused on the local test target and its Docker Compose setup.

## Before You Start

- Open an issue to discuss larger changes or changes to the test baseline before starting work.
- Preserve PHP 8.4.26, `memory_limit=128M`, and `display_errors=On` unless a change to the test baseline is explicitly intended.
- Keep the service bound to localhost and retain the existing network protections. Do not expose this test target to untrusted networks.
- Do not include generated security artifacts unless the change specifically requires them.

## Making Changes

- Make the smallest focused change that addresses the issue.
- Update the README when setup, behavior, or validation instructions change.
- Describe the behavior changed and any relevant test results in your pull request.

## Local Validation

When Docker Engine and the Docker Compose plugin are available, build and start the service:

```sh
docker compose up --build -d --wait --wait-timeout 30
```

Send the benign multipart baseline request and confirm the expected response:

```sh
curl --fail-with-body --max-time 10 -sS -F "test_field=baseline" http://127.0.0.1:8080/
```

Stop the service when validation is complete:

```sh
docker compose down
```

Avoid resource-exhaustion or exploit payloads as routine validation. If Docker is unavailable, state which checks you could not run in the pull request.

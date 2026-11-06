# PHP2Shell DAST Test Target

> **WARNING: Testing purposes only. This is a vulnerable web application intended only for isolated security testing. Do not deploy it publicly or use it in production.**

A local PHP endpoint for checking multipart form handling in a DAST test environment.

## Stack

- PHP 8.4.26 FPM on Alpine
- Nginx with PHP-FPM, supervised in one container
- PHP `memory_limit` set to `128M`
- PHP `display_errors` enabled
- Docker Compose health check for the HTTP endpoint

The service publishes port `127.0.0.1:8080` for local access only.

## Run

Requires Docker Engine and the Docker Compose plugin.

```powershell
docker compose up --build -d --wait --wait-timeout 30
```

Send a benign multipart request:

```powershell
curl.exe --fail-with-body --max-time 10 -sS -F "test_field=baseline" http://127.0.0.1:8080/
```

Expected response:

```text
[+] Request received via POST.
[+] Processed keys: 1 fields, 0 files.
```

Open `http://127.0.0.1:8080/` in a browser to view the baseline form.

## Stop

```powershell
docker compose down
```

## Security

This is an isolated DAST test fixture, not a production service. It uses PHP 8.4.26, which is listed as affected by [CVE-2026-109618](https://nvd.nist.gov/vuln/detail/CVE-2026-109618) and [CVE-2026-109619](https://nvd.nist.gov/vuln/detail/CVE-2026-109619). Compose binds port `8080` to `127.0.0.1` on the host; keep host and network firewall rules in place to prevent untrusted access. `display_errors` is enabled for testing and can disclose diagnostic details in HTTP responses.

## License

Licensed under the [MIT License](LICENSE).

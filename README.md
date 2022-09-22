## super simple messanger core based on SSE (symfony + mercure) without auth and validation

### setup
```bash
make && \
docker-compose up -d && \
docker exec -it chat bash -c \
  "npm install && composer install && \
  mkdir -p public/build && \
  chown 1000:1000 public/build && \
  npm run dev"
```


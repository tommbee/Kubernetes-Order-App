FROM golang:1.10.0-alpine3.7 AS build-env
ENV GOPATH /go
ENV PATH $GOPATH/bin:$PATH

RUN apk --update add curl git

# Set the working directory to the app directory
RUN mkdir -p /go/src/app
WORKDIR /go/src/app/

# Download dep binary to bin folder in $GOPATH
RUN mkdir -p /usr/local/bin \
    && curl -fsSL -o /usr/local/bin/dep https://github.com/golang/dep/releases/download/v0.4.1/dep-linux-amd64 \
    && chmod +x /usr/local/bin/dep

COPY . .
# Restore dependancies with dep 
RUN dep ensure -v
# Build binary
RUN go build -o ./build/capture-app .

# final stage
FROM alpine:3.7
RUN apk update && apk add ca-certificates && rm -rf /var/cache/apk/*
RUN update-ca-certificates
WORKDIR /app
COPY --from=build-env /go/src/app/build /app/
# EH
# ENV EVENTURL=
# ENV EVENTPOLICYNAME=
# ENV EVENTPOLICYKEY=
# # ACK Logging
# ENV TEAMNAME=
# # Mongo/Cosmos
# ENV MONGOHOST=
# # RabbitMQ
# ENV RABBITMQHOST=
EXPOSE 8080

CMD ["./capture-app"]
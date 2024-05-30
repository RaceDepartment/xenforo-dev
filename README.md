# xenforo-dev

Docker template for a XenForo development environment

# getting started

NOTE: by default the docker compose will try and expose the web server on port 7080

1. ensure you have an archive of the xenforo install e.g.

        cp ~/Downloads/xenforo.2.2.bz2 xfdev

2. (optional) if you want to be able to ssh onto the instance create an authorized_keys e.g.

        cp ~/.ssh/id_rsa.pub xfdev/ssh/authorized_keys

3. build the image:

        docker compose build

    This will take quite a while (30+ minutes) due to the XF install step

4. run the image:

        docker compose up -d

5. wait a few seconds for the services to start then connect to http://127.0.0.1:7080/

6. (optional) add the following to ~/.ssh/config

        Host xfdev
        User www-data
        HostName 127.0.0.1
        Port 7022

# users

There are a number of default users created during the build process
all of which have the default password of `overtake`

| system  | user        | role            |  
|-------- |------------ | --------------- |
| mysql   | xf          | XenForo user    |
| XenForo | admin       | admin           |
| XenForo | WilmaCargo  | premium user    |
| XenForo | MilesBehind | premium user    |
| XenForo | GloriaSlap  | premium user    |
| XenForo | MaxThrottle | premium user    |
| XenForo | PercyVeer   | registered user |
| XenForo | WillySwerve | registered user |
| XenForo | RolandSlide | registered user |

# misc

connect to running container as root

    docker exec -it xenforo-dev-xfdev-1 /bin/bash

copy files to running container

    docker cp foo.txt xenforo-dev-xfdev-1:/foo.txt

remove volumes (start from clean XF install image)

    docker volume rm xenforo-dev_html
    docker volume rm xenforo-dev_mysql
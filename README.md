# demo-srv-idp

This project contains a demo environment for the MIRACL srv-idp service (SAML Identity Provider for ZFA-SSO).


## Requirements

* [Docker](https://www.docker.com/products/overview)
* [Docker Compose](https://docs.docker.com/compose)


## Configuration

Set the ***client_id*** and ***client_secret*** field values in the **zfa** section of the **config.json** file.  
To obtain these values you can [register to MIRACL Trust® for a 30 day trial](https://trust.miracl.cloud/get-started).  
The detailed instructions can be found at [https://devdocs.trust.miracl.cloud/register-create-new-app](https://devdocs.trust.miracl.cloud/register-create-new-app).  
The Redirect URL is **127.0.0.1:8000/login**.

Edit the **ldap_users.ldif** file to add an entry with your user email. For example:

```
dn: cn=testuser,ou=users,dc=example,dc=com
cn: testuser
mail: TEST.USER@YOUR.DOMAIN.COM
objectclass: inetOrgPerson
sn: testuser
```

## Usage

Build and run the environment by issuing the command (requires [GNU Make](http://www.gnu.org/software/make/)):
```sh
make start
```
or run the **demo.bat** file in Windows and select option **1**.

The Identity Provider service is located at [http://127.0.0.1:8000](http://127.0.0.1:8000).

You can log in using the [http://127.0.0.1:8000/services](http://127.0.0.1:8000/services) endpoint.


To stop the environment you can issue the command:
```sh
make stop
```
or run the **demo.bat** file in Windows and select option **2**.


To delete the containers:
```sh
make clean
```
or run the **demo.bat** file in Windows and select option **3**.


### Consul

The consul administration console is at [http://127.0.0.1:58500](http://127.0.0.1:58500).  
The srv-idp configuration can be found at [http://127.0.0.1:58500/ui/#/dc1/kv/config/srv-idp/edit](http://127.0.0.1:58500/ui/#/dc1/kv/config/srv-idp/edit)


### Graphite

The Graphite administration console is at [http://127.0.0.1:51080](http://127.0.0.1:51080).  
This can be used to create graphs of the srv-idp generated metrics (performance information such as session starts, logins, communications with the authentication server, status spikes etc.)

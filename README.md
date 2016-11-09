### FuelPHP+MySQL

#### Setup

```bash
git clone https://github.com/hiro511/FuelPHP-MySQL.git
cd FuelPHP-MySQL
docker-compose up
```

#### Generate

```bash
docker exec -it fuel bash
php ./fuel/oil g model model_name title:varchar[50] body:text user_id:int
```

##### Type
- varchar[n]
- string[n]
- int[n]
- enum[value1, value2]
- decimal[n, n]
- float[n, n]
- text
- blob
- datetime
- date
- timestamp
- time

#### Migration
```bash
docker exec -it fuel bash
php ./fuel/oil refine migrate
```

# Doctrine Tutorial
- Tutorial link: [http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html)
- Tutorial code: [https://github.com/doctrine/doctrine2-orm-tutorial](https://github.com/doctrine/doctrine2-orm-tutorial)

### Dependencies:
- [Composer](http://getcomposer.org/)

### Objective:
Create a [Bug Tracker](http://framework.zend.com/manual/en/zend.db.table.html):
- A bug has a description, creation date, status, reporter and engineer
- A bug can occur on different products (platforms)
- Products have a name.
- Bug Reporter and Engineers are both Users of the System.
- A user can create new bugs.
- The assigned engineer can close a bug.
- A user can see all his reported or assigned bugs.
- Bugs can be paginated through a list-view.

### Issues:
- [CLOSED Status](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#updating-entities)
	- In `$this->status = "CLOSE";`, the string `CLOSE` should be `CLOSED`, with a 'D' on the end, so that it matches the code in [Entity Repositories](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#entity-repositories). Otherwise, bugs will not be retrieved correctly.
- [Repository Class](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#adding-bug-and-user-entities)
	- `@Entity(repositoryClass="BugRepository")` does not require the `repositoryClass` to be set just yet. Bug, like Product, can simply use the default repository (which it will do anyways until the BugRepository class is created). An update is called for later when adding the BugRepository class in [Entity Repositories](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#entity-repositories).

### Debugging:
> Lazy load proxies always contain an instance of Doctrine’s EntityManager and all its dependencies. Therefore a var_dump() will possibly dump a very large recursive structure which is impossible to render and read. You have to use Doctrine\Common\Util\Debug::dump() to restrict the dumping to a human readable level. Additionally you should be aware that dumping the EntityManager to a Browser may take several minutes, and the Debug::dump() method just ignores any occurrences of it in Proxy instances.

### Caching:
- "The recommended cache driver to use with Doctrine is APC." ~ [doctrine-project.org](http://docs.doctrine-project.org/en/latest/reference/advanced-configuration.html#advanced-configuration)
- [Alternative PHP Cache](http://us1.php.net/apc)

### Additional Reading:
- [Association Mapping](http://docs.doctrine-project.org/en/latest/reference/association-mapping.html)
- [Command Line Shell For SQLite](http://www.sqlite.org/sqlite.html)
- [Doctrine Mapping Types](http://docs.doctrine-project.org/en/latest/reference/basic-mapping.html#doctrine-mapping-types)
- DQL (in project): /vendor/doctrine/orm/docs/en/reference/dql-doctrine-query-language.rst
	- Anything in /vendor/doctrine/orm/docs/en/ is worth reading.
- [Object-relational Mapping](http://en.wikipedia.org/wiki/Object-relational_mapping)
- [Persistent Data Structure](http://en.wikipedia.org/wiki/Persistent_data_structure)
- [Reflection API](http://php.net/manual/en/intro.reflection.php)
- [Unit of Work Pattern and Persistence Ignorance](http://msdn.microsoft.com/en-us/magazine/dd882510.aspx)
- [Zend_Db_Table](http://framework.zend.com/manual/1.12/en/zend.db.table.html)
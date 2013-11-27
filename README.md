# Doctrine Tutorial
[Current Step](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#adding-bug-and-user-entities)

- Tutorial link: [http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html)
- Tutorial code: [https://github.com/doctrine/doctrine2-orm-tutorial](https://github.com/doctrine/doctrine2-orm-tutorial)

**[Bug Tracker](http://framework.zend.com/manual/en/zend.db.table.html)**
- A Bugs has a description, creation date, status, reporter and engineer
- A bug can occur on different products (platforms)
- Products have a name.
- Bug Reporter and Engineers are both Users of the System.
- A user can create new bugs.
- The assigned engineer can close a bug.
- A user can see all his reported or assigned bugs.
- Bugs can be paginated through a list-view.

### Dependencies:
- [Composer](http://getcomposer.org/)

### Caching:
- "The recommended cache driver to use with Doctrine is APC." ~ [doctrine-project.org](http://docs.doctrine-project.org/en/latest/reference/advanced-configuration.html#advanced-configuration)
- [Alternative PHP Cache](http://us1.php.net/apc)

### Additional Reading:
- [Association Mapping](http://docs.doctrine-project.org/en/latest/reference/association-mapping.html)
- [Object-relational Mapping](http://en.wikipedia.org/wiki/Object-relational_mapping)
- [Persistent Data Structure](http://en.wikipedia.org/wiki/Persistent_data_structure)
- [Reflection API](http://php.net/manual/en/intro.reflection.php)
- [Unit of Work Pattern and Persistence Ignorance](http://msdn.microsoft.com/en-us/magazine/dd882510.aspx)
- [Zend_Db_Table](http://framework.zend.com/manual/1.12/en/zend.db.table.html)
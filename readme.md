# 青鸟内容管理系统【QNZCMS】

### 文件目录：


```
project
│   README.md
│   file001.txt    
│
└───folder1
│   │   file011.txt
│   │   file012.txt
│   │
│   └───subfolder1
│       │   file111.txt
│       │   file112.txt
│       │   ...
│   
└───folder2
    │   file021.txt
    │   file022.txt
```

.. code::
.
|-- ContentStore
|   |-- de-DE
|   |   |-- art.mshc
|   |   |-- artnoloc.mshc
|   |   |-- clientserver.mshc
|   |   |-- noarm.mshc
|   |   |-- resources.mshc
|   |   `-- windowsclient.mshc
|   `-- en-US
|       |-- art.mshc
|       |-- artnoloc.mshc
|       |-- clientserver.mshc
|       |-- noarm.mshc
|       |-- resources.mshc
|       `-- windowsclient.mshc
`-- IndexStore
    |-- de-DE
    |   |-- art.mshi
    |   |-- artnoloc.mshi
    |   |-- clientserver.mshi
    |   |-- noarm.mshi
    |   |-- resources.mshi
    |   `-- windowsclient.mshi
    `-- en-US
        |-- art.mshi
        |-- artnoloc.mshi
        |-- clientserver.mshi
        |-- noarm.mshi
        |-- resources.mshi
        `-- windowsclient.mshi

### 引用第三方类库：

  - phpmailer/phpmailer 6.0    【邮箱服务】
  - jasongrimes/paginator 1.0    【分页组件】
  - illuminate/database": "*"   【ORM】
  - gregwar/captcha 1.17   【验证码】
  - twig/twig 3.0   【模板引擎】
  - phpfastcache/phpfastcache 7.1   【缓存】
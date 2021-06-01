# Proyecto-Progra-Web

## Esquema de la DB

* Users (ID(pk), email(unique), password, name, created_at, content_watched, my_list, photo_path) default
* Contents (ID(pk), Name, Description, Duration, Year, Genre, Image, is_serie, chapter)
* ContUsers (ID_user(pk, fk), ID_content(pk, fk), minute)
* Chapters (ID(pk), ID_content(pk, fk), Name, Description, Duration)

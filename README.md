# LARAVEL-ENCRYPT

- Use trait for your models when you want to hash attribute, in the database type of field for the attribute should be `TEXT`: 

- Example for Model:
```
use Illuminate\Database\Eloquent\Casts\Attribute;

...implements ...IModelUseEncryptedAttributes{
use ModelUseEncryptedAttributes;
...
    public function attributeOne() :Attribute
    {
        return $this->encryptedAttribute();
    }
...
    public function attributeTwo() :Attribute
    {
        return $this->encryptedAttribute();
    }
...
```
- Attribute will automatically been hashed for save/update and uhashed when you will initialize the model


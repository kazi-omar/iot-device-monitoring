# Senior JavaScript Developer Interview Questions - Part 2

This document covers advanced JavaScript concepts that are frequently asked in senior developer interviews. Each section includes practical examples to help you understand the concepts more deeply.

## Table of Contents
1. [Null vs Undefined](#null-vs-undefined)
2. [Hoisting in JavaScript](#hoisting-in-javascript)
3. [JSONP and Its Differences from AJAX](#jsonp-and-its-differences-from-ajax)
4. [Code Style and Best Practices](#code-style-and-best-practices)
5. [Prototypal Inheritance](#prototypal-inheritance)
6. [Module Pattern vs Constructor/Prototype](#module-pattern-vs-constructorprototype)
7. [Pass by Value vs Pass by Reference](#pass-by-value-vs-pass-by-reference)
8. [Deep Freezing Objects](#deep-freezing-objects)
9. [The 'this' Keyword Inconsistency](#the-this-keyword-inconsistency)
10. [Regular Functions vs Arrow Functions](#regular-functions-vs-arrow-functions)
11. [Async/Await vs Generators](#asyncawait-vs-generators)

## Null vs Undefined

**Interview Question: What's the difference between null and undefined? How could we check for these states?**

### Explanation

- **undefined**: Represents a variable that has been declared but not assigned a value, or an attempt to access a property that doesn't exist
- **null**: A primitive value representing the intentional absence of any object value

The key difference is that `undefined` typically occurs unintentionally when something doesn't exist, while `null` is explicitly assigned by developers.

### Examples

```javascript
// undefined examples
let variable;
console.log(variable); // undefined

const obj = {};
console.log(obj.property); // undefined

// null examples
let intentionallyEmpty = null;
console.log(intentionallyEmpty); // null

// Checking for null and undefined
// Using strict equality
if (variable === undefined) {
  console.log('Variable is undefined');
}

if (intentionallyEmpty === null) {
  console.log('Variable is null');
}

// Checking for either null or undefined
if (variable == null) {
  console.log('Variable is either null or undefined');
}

// Using typeof (only reliable for undefined)
if (typeof variable === 'undefined') {
  console.log('Variable is undefined');
}

// Nullish coalescing operator (ES2020)
const value = variable ?? 'Default value'; // 'Default value' if variable is null or undefined
```

### Practical Use Case

Null is often used in API responses to explicitly indicate that a value is intentionally empty, while undefined typically indicates that a property doesn't exist:

```javascript
// API response example
const userResponse = {
  name: "John",
  email: "john@example.com",
  phoneNumber: null, // User explicitly has no phone number
  // address is not defined in the response, so accessing it would be undefined
};

// Handling both cases
function displayUserContact(user) {
  // Handle phone display
  if (user.phoneNumber === null) {
    console.log("No phone number provided");
  } else if (user.phoneNumber === undefined) {
    console.log("Phone number field not present in data");
  } else {
    console.log(`Phone: ${user.phoneNumber}`);
  }
  
  // Handle address display
  if (user.address === null) {
    console.log("No address provided");
  } else if (user.address === undefined) {
    console.log("Address field not present in data");
  } else {
    console.log(`Address: ${user.address}`);
  }
}
```

## Hoisting in JavaScript

**Interview Question: What do you understand about hoisting in JavaScript?**

### Explanation

Hoisting is a JavaScript behavior where variable and function declarations are moved to the top of their containing scope during the compilation phase, before code execution.

- Variables declared with `var` are hoisted and initialized with `undefined`
- Function declarations are hoisted completely with their definition
- Variables declared with `let` and `const` are hoisted but not initialized (creating a "temporal dead zone")

### Examples

```javascript
// Variable hoisting with var
console.log(hoistedVar); // undefined (not an error)
var hoistedVar = "I'm hoisted";

// Function hoisting
hoistedFunction(); // "I'm a hoisted function" (works fine)
function hoistedFunction() {
  console.log("I'm a hoisted function");
}

// let and const are hoisted but not initialized
// console.log(hoistedLet); // ReferenceError: Cannot access 'hoistedLet' before initialization
let hoistedLet = "I'm hoisted but not initialized";

// Function expressions are not hoisted with their definition
// functionExpression(); // TypeError: functionExpression is not a function
var functionExpression = function() {
  console.log("I'm not hoisted with my definition");
};
```

### How Hoisting Actually Works (Behind the Scenes)

The JavaScript engine processes code in two phases:
1. **Compilation phase**: Declarations are processed and set up in memory
2. **Execution phase**: Assignments and code execution happen

Conceptually, the first example above is processed like this:

```javascript
// During compilation phase
var hoistedVar; // Declaration is hoisted and initialized with undefined

// During execution phase
console.log(hoistedVar); // undefined
hoistedVar = "I'm hoisted"; // Assignment happens where it was in code
```

### Practical Considerations

Understanding hoisting helps avoid bugs caused by accessing variables before they're properly initialized:

```javascript
// Poor practice (relying on hoisting)
function processUser() {
  console.log("Processing user:", username); // undefined
  
  if (isValid) {
    // Some code here
  }
  
  var username = "john_doe";
  var isValid = true;
}

// Better practice (declarations at the top)
function processUser() {
  var username = "john_doe";
  var isValid = true;
  
  console.log("Processing user:", username); // "john_doe"
  
  if (isValid) {
    // Some code here
  }
}

// Best practice (using let/const for block scoping)
function processUser() {
  const username = "john_doe";
  const isValid = true;
  
  console.log("Processing user:", username);
  
  if (isValid) {
    // Some code here
  }
}
```

## JSONP and Its Differences from AJAX

**Interview Question: Could you explain how JSONP works and how it's different from AJAX?**

### Explanation

JSONP (JSON with Padding) is a technique used to overcome the same-origin policy limitations of browsers by using script tags to load data from different domains.

#### Key differences from AJAX:

1. **Cross-origin capabilities**: JSONP works across domains without CORS, while AJAX requires CORS for cross-origin requests
2. **Execution model**: JSONP injects a script tag that executes immediately, while AJAX makes HTTP requests that return data
3. **Methods**: JSONP only supports GET requests, while AJAX supports all HTTP methods
4. **Security**: JSONP is less secure as it requires executing external code
5. **Error handling**: JSONP has limited error handling, while AJAX provides detailed error information

### Examples

#### JSONP Example

```javascript
// JSONP implementation
function handleJSONPResponse(data) {
  console.log("JSONP data received:", data);
  // Process the data here
}

function requestViaJSONP(url) {
  // Create a script element
  const script = document.createElement('script');
  
  // Add callback parameter to the URL
  const callbackName = 'handleJSONPResponse';
  const jsonpUrl = `${url}?callback=${callbackName}`;
  
  // Set the src attribute to trigger the request
  script.src = jsonpUrl;
  
  // Append to the document to execute the request
  document.body.appendChild(script);
  
  // Clean up after execution
  script.onload = function() {
    document.body.removeChild(script);
  };
}

// Usage
requestViaJSONP('https://api.example.com/data');

// The server would respond with something like:
// handleJSONPResponse({ "name": "John", "age": 30 });
```

#### AJAX Example for Comparison

```javascript
// AJAX implementation
function requestViaAJAX(url) {
  return fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      console.log("AJAX data received:", data);
      // Process the data here
      return data;
    })
    .catch(error => {
      console.error("AJAX error:", error);
    });
}

// Usage
requestViaAJAX('https://api.example.com/data');
```

### Practical Use Case

JSONP is mostly used for legacy applications or when dealing with APIs that don't support CORS:

```javascript
// JSONP example with dynamic callback
function loadGoogleMapsData() {
  // Create a unique callback name
  const callbackName = 'googleMapsCallback_' + Math.round(Math.random() * 100000);
  
  // Define the callback function on the window object
  window[callbackName] = function(response) {
    console.log('Google Maps data:', response);
    // Process map data
    
    // Clean up the global function
    delete window[callbackName];
  };
  
  // Create and append the script tag
  const script = document.createElement('script');
  script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=${callbackName}`;
  document.body.appendChild(script);
}
```

## Code Style and Best Practices

**Interview Question: What tools could be used to ensure a consistent code style?**

### Explanation

Consistent code style is crucial for maintainable codebases, especially in team environments. Modern JavaScript development relies on several tools to enforce coding standards.

### Tools and Principles

1. **Coding Principles**:
   - **KISS** (Keep It Simple, Stupid): Focus on simplicity and readability
   - **DRY** (Don't Repeat Yourself): Avoid code duplication
   - **SOLID** principles: Guidelines for object-oriented design

2. **Code Formatters**:
   - **Prettier**: Automatically formats code according to predefined rules
   - **EditorConfig**: Maintains consistent coding styles across different editors

3. **Linters**:
   - **ESLint**: Identifies problematic patterns and enforces style rules
   - **JSHint**: Detects potential errors and enforces coding conventions

4. **Pre-commit Hooks**:
   - **Husky**: Runs scripts before code is committed
   - **lint-staged**: Runs linters on staged files

### Examples

#### ESLint Configuration (.eslintrc.js)

```javascript
module.exports = {
  "env": {
    "browser": true,
    "es2021": true,
    "node": true
  },
  "extends": [
    "eslint:recommended",
    "plugin:react/recommended"
  ],
  "parserOptions": {
    "ecmaFeatures": {
      "jsx": true
    },
    "ecmaVersion": 12,
    "sourceType": "module"
  },
  "plugins": [
    "react"
  ],
  "rules": {
    "indent": ["error", 2],
    "linebreak-style": ["error", "unix"],
    "quotes": ["error", "single"],
    "semi": ["error", "always"],
    "no-unused-vars": "warn",
    "no-console": "warn"
  }
};
```

#### Prettier Configuration (.prettierrc)

```json
{
  "singleQuote": true,
  "trailingComma": "es5",
  "printWidth": 100,
  "tabWidth": 2,
  "semi": true
}
```

#### Husky and lint-staged Configuration (package.json)

```json
{
  "husky": {
    "hooks": {
      "pre-commit": "lint-staged"
    }
  },
  "lint-staged": {
    "*.js": [
      "eslint --fix",
      "prettier --write"
    ],
    "*.jsx": [
      "eslint --fix",
      "prettier --write"
    ]
  }
}
```

### Practical Implementation

Setting up a project with consistent code style:

```bash
# Install ESLint and Prettier
npm install --save-dev eslint prettier

# Install ESLint plugins and configs
npm install --save-dev eslint-config-prettier eslint-plugin-prettier

# Set up pre-commit hooks
npm install --save-dev husky lint-staged

# Initialize ESLint
npx eslint --init
```

The issue with `--no-verify` flag:

```bash
# Bad practice: Bypassing pre-commit hooks
git commit -m "Quick fix" --no-verify
```

To prevent this, some teams implement server-side hooks or CI/CD checks that run the same validations.

## Prototypal Inheritance

**Interview Question: What do you understand by prototyping in JavaScript?**

### Explanation

Prototypal inheritance is a fundamental concept in JavaScript where objects can inherit properties and methods from other objects through their prototype chain. Every JavaScript object has a prototype property, which refers to another object.

### Examples

#### Basic Prototypal Inheritance

```javascript
// Creating a prototype method for arrays
Array.prototype.sum = function() {
  return this.reduce((total, current) => total + current, 0);
};

// Now every array has access to the sum method
const numbers = [1, 2, 3, 4, 5];
console.log(numbers.sum()); // 15

// Another example with custom objects
function Person(name) {
  this.name = name;
}

Person.prototype.greet = function() {
  return `Hello, my name is ${this.name}`;
};

const john = new Person('John');
console.log(john.greet()); // "Hello, my name is John"
```

#### Extending Built-in Objects (with caution)

```javascript
// Adding an indexOfIgnoreCase method to all strings
String.prototype.indexOfIgnoreCase = function(searchString) {
  return this.toLowerCase().indexOf(searchString.toLowerCase());
};

const text = "JavaScript is awesome";
console.log(text.indexOfIgnoreCase("SCRIPT")); // 4
```

### Practical Use Case: Polyfills

Prototypes are commonly used to implement polyfills for newer JavaScript features in older browsers:

```javascript
// Polyfill for Array.includes() for older browsers
if (!Array.prototype.includes) {
  Array.prototype.includes = function(searchElement, fromIndex) {
    if (this == null) {
      throw new TypeError('"this" is null or not defined');
    }

    const o = Object(this);
    const len = o.length >>> 0;
    
    if (len === 0) return false;
    
    const n = fromIndex | 0;
    let k = Math.max(n >= 0 ? n : len + n, 0);
    
    while (k < len) {
      if (o[k] === searchElement) {
        return true;
      }
      k++;
    }
    
    return false;
  };
}

// Now it works even in browsers that don't support includes natively
const fruits = ['apple', 'banana', 'mango'];
console.log(fruits.includes('banana')); // true
```

### Prototype Chain Visualization

```javascript
// Create constructor functions
function Animal(name) {
  this.name = name;
}

Animal.prototype.breathe = function() {
  return `${this.name} is breathing`;
};

function Dog(name, breed) {
  Animal.call(this, name); // Call parent constructor
  this.breed = breed;
}

// Set up prototype chain: Dog -> Animal
Dog.prototype = Object.create(Animal.prototype);
Dog.prototype.constructor = Dog; // Fix constructor reference

// Add Dog-specific method
Dog.prototype.bark = function() {
  return `${this.name} says woof!`;
};

// Create an instance
const rex = new Dog('Rex', 'German Shepherd');

console.log(rex.name); // "Rex"
console.log(rex.breed); // "German Shepherd"
console.log(rex.bark()); // "Rex says woof!"
console.log(rex.breathe()); // "Rex is breathing"

// Demonstrate prototype chain
console.log(rex.__proto__ === Dog.prototype); // true
console.log(rex.__proto__.__proto__ === Animal.prototype); // true
console.log(rex.__proto__.__proto__.__proto__ === Object.prototype); // true
```

## Module Pattern vs Constructor/Prototype

**Interview Question: How would you compare the use of the module pattern against a constructor using prototype?**

### Explanation

Both the module pattern and constructor/prototype approach are ways to organize code in JavaScript, but they serve different purposes and have different characteristics.

#### Module Pattern
- Creates a single instance (singleton)
- Provides encapsulation and private members
- Uses closures to maintain state
- Suitable for utilities and services

#### Constructor/Prototype
- Creates multiple instances
- Inheritance through prototype chain
- Better memory efficiency for multiple instances
- Suitable for object-oriented designs

### Examples

#### Module Pattern

```javascript
// Module pattern example
const calculatorModule = (function() {
  // Private variables
  let result = 0;
  
  // Private function
  function validateNumber(num) {
    return typeof num === 'number' && !isNaN(num);
  }
  
  // Public API
  return {
    add: function(num) {
      if (validateNumber(num)) {
        result += num;
      }
      return this;
    },
    subtract: function(num) {
      if (validateNumber(num)) {
        result -= num;
      }
      return this;
    },
    getResult: function() {
      return result;
    },
    reset: function() {
      result = 0;
      return this;
    }
  };
})();

// Usage
calculatorModule.add(5).subtract(2);
console.log(calculatorModule.getResult()); // 3
calculatorModule.reset();
console.log(calculatorModule.getResult()); // 0

// Can't access private members
console.log(calculatorModule.result); // undefined
```

#### Constructor/Prototype Approach

```javascript
// Constructor function
function Calculator() {
  this.result = 0;
}

// Methods added to prototype
Calculator.prototype.add = function(num) {
  if (this.validateNumber(num)) {
    this.result += num;
  }
  return this;
};

Calculator.prototype.subtract = function(num) {
  if (this.validateNumber(num)) {
    this.result -= num;
  }
  return this;
};

Calculator.prototype.getResult = function() {
  return this.result;
};

Calculator.prototype.reset = function() {
  this.result = 0;
  return this;
};

Calculator.prototype.validateNumber = function(num) {
  return typeof num === 'number' && !isNaN(num);
};

// Create multiple instances
const calculator1 = new Calculator();
const calculator2 = new Calculator();

calculator1.add(5);
calculator2.add(10);

console.log(calculator1.getResult()); // 5
console.log(calculator2.getResult()); // 10
```

### Combining Both Approaches

For more complex applications, you might combine both patterns:

```javascript
// Factory function combining module pattern with prototypes
const CalculatorFactory = (function() {
  // Private shared methods
  function formatResult(result) {
    return parseFloat(result.toFixed(2));
  }
  
  // Constructor
  function Calculator(initialValue = 0) {
    this.result = initialValue;
  }
  
  // Prototype methods
  Calculator.prototype.add = function(num) {
    this.result += num;
    return this;
  };
  
  Calculator.prototype.getFormattedResult = function() {
    return formatResult(this.result);
  };
  
  // Factory API
  return {
    create: function(initialValue) {
      return new Calculator(initialValue);
    }
  };
})();

// Usage
const calc1 = CalculatorFactory.create(10);
const calc2 = CalculatorFactory.create(20);

console.log(calc1.add(5.1234).getFormattedResult()); // 15.12
console.log(calc2.add(7.9876).getFormattedResult()); // 27.99
```

## Pass by Value vs Pass by Reference

**Interview Question: What's the difference between reference and value? Is JavaScript passed by reference or passed by value?**

### Explanation

JavaScript is technically always pass by value, but the values can be references. This often leads to confusion. Here's how it works:

- **Primitive types** (strings, numbers, booleans, null, undefined, symbols) are passed by value
- **Objects** (including arrays and functions) are passed by their reference value

In other words, when you pass an object to a function, you're passing the reference to that object (by value), not the object itself.

### Examples

#### Primitive Types (Pass by Value)

```javascript
// Primitive types are passed by value
function changePrimitive(value) {
  value = 100;
  console.log("Inside function:", value); // 100
}

let number = 42;
changePrimitive(number);
console.log("Outside function:", number); // 42 (unchanged)

// Another example with string
function changeString(str) {
  str = str + " World";
  console.log("Inside function:", str); // "Hello World"
}

let greeting = "Hello";
changeString(greeting);
console.log("Outside function:", greeting); // "Hello" (unchanged)
```

#### Objects (Pass by Reference Value)

```javascript
// Objects are passed by reference value
function changeObject(obj) {
  // Modifying a property changes the original object
  obj.name = "Jane";
  console.log("Inside function:", obj); // { name: "Jane", age: 30 }
}

const person = { name: "John", age: 30 };
changeObject(person);
console.log("Outside function:", person); // { name: "Jane", age: 30 } (changed)

// But reassigning the parameter doesn't affect the original variable
function replaceObject(obj) {
  obj = { name: "Bob", age: 25 }; // This creates a new object
  console.log("Inside function:", obj); // { name: "Bob", age: 25 }
}

const anotherPerson = { name: "Alice", age: 35 };
replaceObject(anotherPerson);
console.log("Outside function:", anotherPerson); // { name: "Alice", age: 35 } (unchanged)
```

### Practical Implications

This behavior has important implications for how you handle data:

```javascript
// Avoiding unintended modifications
function processUser(user) {
  // Bad: Directly modifying the input object
  user.processed = true;
  return user;
}

// Better: Creating a copy before modifying
function safeProcessUser(user) {
  // Create a shallow copy
  const userCopy = { ...user };
  userCopy.processed = true;
  return userCopy;
}

// For nested objects, consider deep copying
function deepProcessUser(user) {
  // Deep copy using JSON (has limitations but works for simple objects)
  const userCopy = JSON.parse(JSON.stringify(user));
  userCopy.settings.notifications = true;
  return userCopy;
}

const user = { name: "John", settings: { theme: "dark" } };

// Original user is modified
const processedUser = processUser(user);
console.log(user.processed); // true

// Original user remains unchanged
const user2 = { name: "Alice", settings: { theme: "light" } };
const safeProcessedUser = safeProcessUser(user2);
console.log(user2.processed); // undefined
```

## Deep Freezing Objects

**Interview Question: How to deep freeze an object in JavaScript?**

### Explanation

Object.freeze() creates a shallow freeze, meaning it only freezes the top-level properties of an object. For nested objects, you need to implement a deep freeze function that recursively freezes all nested objects.

### Examples

#### Shallow vs Deep Freeze

```javascript
// Shallow freeze example
const user = {
  name: "John",
  age: 30,
  address: {
    city: "New York",
    zip: "10001"
  }
};

Object.freeze(user);

// Can't modify top-level properties
user.name = "Jane"; // No effect in strict mode
console.log(user.name); // Still "John"

// But nested objects can be modified
user.address.city = "Boston"; // Works!
console.log(user.address.city); // "Boston"
```

#### Implementing Deep Freeze

```javascript
// Deep freeze function
function deepFreeze(obj) {
  // Freeze the object itself
  Object.freeze(obj);
  
  // Iterate through all properties
  Object.keys(obj).forEach(key => {
    const value = obj[key];
    
    // Recursively freeze any nested objects
    if (value && typeof value === 'object' && !Object.isFrozen(value)) {
      deepFreeze(value);
    }
  });
  
  return obj;
}

// Usage
const user = {
  name: "John",
  age: 30,
  address: {
    city: "New York",
    zip: "10001",
    coordinates: {
      lat: 40.7128,
      lng: -74.0060
    }
  }
};

// Deep freeze the user object
deepFreeze(user);

// Try modifying properties
user.name = "Jane"; // No effect
user.address.city = "Boston"; // No effect
user.address.coordinates.lat = 42.3601; // No effect

console.log(user.name); // Still "John"
console.log(user.address.city); // Still "New York"
console.log(user.address.coordinates.lat); // Still 40.7128
```

### Practical Use Case

Deep freezing is useful for ensuring immutability in your application, particularly for configuration objects or constants:

```javascript
// Application configuration
const APP_CONFIG = deepFreeze({
  api: {
    baseUrl: "https://api.example.com",
    timeout: 5000,
    endpoints: {
      users: "/users",
      products: "/products"
    }
  },
  features: {
    darkMode: true,
    notifications: {
      enabled: true,
      pollingInterval: 60000
    }
  }
});

// Now the entire configuration is immutable
// APP_CONFIG.api.baseUrl = "https://new-api.example.com"; // No effect
```

## The 'this' Keyword Inconsistency

**Interview Question: Why is the 'this' operator inconsistent in JavaScript?**

### Explanation

The `this` keyword in JavaScript can be confusing because its value is determined by how a function is called, not where it's defined. The value of `this` depends on the execution context.

### Different Contexts for 'this'

1. **Global context**: `this` refers to the global object (`window` in browsers, `global` in Node.js)
2. **Function context**: Depends on how the function is called
3. **Object method**: `this` refers to the object that owns the method
4. **Event handlers**: `this` typically refers to the element that triggered the event
5. **Constructor functions**: `this` refers to the newly created instance
6. **Arrow functions**: `this` is lexically bound (inherits from parent scope)

### Examples

```javascript
// Global context
console.log(this); // Window object in browser

// Simple function call
function showThis() {
  console.log(this);
}
showThis(); // Window object in browser (or global in Node.js)

// As an object method
const user = {
  name: 'John',
  showThis: function() {
    console.log(this);
  }
};
user.showThis(); // The user object

// Using call/apply to set 'this'
const otherUser = { name: 'Jane' };
user.showThis.call(otherUser); // The otherUser object

// In an event handler
document.getElementById('button').addEventListener('click', function() {
  console.log(this); // The button element
});

// In a constructor function
function User(name) {
  this.name = name;
  console.log(this); // The newly created User instance
}
const john = new User('John');

// Method is called from a variable
const method = user.showThis;
method(); // Window object, not user!

// In nested functions
const app = {
  name: 'MyApp',
  start: function() {
    console.log(this); // The app object
    
    function nestedFunction() {
      console.log(this); // Window object, not app!
    }
    
    nestedFunction();
  }
};
app.start();
```

### Common Workarounds

```javascript
// Traditional workaround: Self/That pattern
const app = {
  name: 'MyApp',
  start: function() {
    const self = this; // Store 'this' in a variable
    
    function nestedFunction() {
      console.log(self.name); // Works correctly
    }
    
    nestedFunction();
  }
};

// Bind method
const app2 = {
  name: 'MyApp2',
  start: function() {
    function nestedFunction() {
      console.log(this.name);
    }
    
    // Create a new function with 'this' bound to app2
    const boundFunction = nestedFunction.bind(this);
    boundFunction(); // Works correctly
  }
};

// Modern solution: Arrow functions
const app3 = {
  name: 'MyApp3',
  start: function() {
    // Arrow function inherits 'this' from parent scope
    const nestedFunction = () => {
      console.log(this.name); // Works correctly
    };
    
    nestedFunction();
  }
};
```

## Regular Functions vs Arrow Functions

**Interview Question: What is the difference between functions declared using the function keyword and arrow functions? What are the cons of using arrow functions?**

### Explanation

Arrow functions were introduced in ES6 and have syntactical and behavioral differences from regular functions. The key differences involve how they handle the `this` keyword, arguments, and constructors.

### Key Differences

1. **`this` binding**:
   - Regular functions: `this` is dynamic, determined by how the function is called
   - Arrow functions: `this` is lexical, inherited from the parent scope

2. **`arguments` object**:
   - Regular functions: Have their own `arguments` object
   - Arrow functions: Do not have their own `arguments` object

3. **Constructor usage**:
   - Regular functions: Can be used as constructors with `new`
   - Arrow functions: Cannot be used as constructors

4. **`prototype` property**:
   - Regular functions: Have a `prototype` property
   - Arrow functions: Do not have a `prototype` property

5. **Binding methods like `call()`, `apply()`, and `bind()`**:
   - Regular functions: Can have their `this` context changed
   - Arrow functions: Cannot have their `this` context changed

### Examples

```javascript
// 'this' binding difference
const obj = {
  name: 'Object',
  
  // Regular function
  regularMethod: function() {
    console.log(this.name); // 'Object'
    
    setTimeout(function() {
      console.log(this.name); // undefined (or window.name in non-strict mode)
    }, 100);
  },
  
  // Arrow function
  arrowMethod: function() {
    console.log(this.name); // 'Object'
    
    setTimeout(() => {
      console.log(this.name); // 'Object' - inherited from parent
    }, 100);
  }
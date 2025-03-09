# Laravel Interview Questions: A Comprehensive Guide for Senior PHP Developers

## Table of Contents
1. [PHP Fundamentals](#php-fundamentals)
   - [Object-Oriented Programming in PHP](#object-oriented-programming-in-php)
   - [PHP 7+ Features](#php-7-features)
   - [PHP 8+ Features](#php-8-features)
   - [Type System and Type Hints](#type-system-and-type-hints)
   - [Error Handling and Exceptions](#error-handling-and-exceptions)
   - [PHP Memory Management](#php-memory-management)

2. [Laravel Architecture](#laravel-architecture)
   - [Service Container](#service-container)
   - [Service Providers](#service-providers)
   - [Facades](#facades)
   - [Contracts](#contracts)
   - [Laravel Lifecycle](#laravel-lifecycle)
   - [Directory Structure](#directory-structure)

3. [Routing & Middleware](#routing--middleware)
   - [Route Types and Registration](#route-types-and-registration)
   - [Route Parameters](#route-parameters)
   - [Route Model Binding](#route-model-binding)
   - [Middleware Pipeline](#middleware-pipeline)
   - [Global vs Route Middleware](#global-vs-route-middleware)
   - [Creating Custom Middleware](#creating-custom-middleware)

4. [Controllers & Requests](#controllers--requests)
   - [Controller Types](#controller-types)
   - [Single Action Controllers](#single-action-controllers)
   - [Request Validation](#request-validation)
   - [Form Requests](#form-requests)
   - [Dependency Injection in Controllers](#dependency-injection-in-controllers)
   - [API Resource Controllers](#api-resource-controllers)

5. [Eloquent ORM](#eloquent-orm)
   - [Eloquent vs Query Builder](#eloquent-vs-query-builder)
   - [Model Relationships](#model-relationships)
   - [Eager Loading](#eager-loading)
   - [Query Scopes](#query-scopes)
   - [Accessors and Mutators](#accessors-and-mutators)
   - [Events and Observers](#events-and-observers)
   - [Polymorphic Relationships](#polymorphic-relationships)

6. [Database & Migrations](#database--migrations)
   - [Migration Strategies](#migration-strategies)
   - [Schema Builder](#schema-builder)
   - [Seeders and Factories](#seeders-and-factories)
   - [Query Optimization](#query-optimization)
   - [Database Transactions](#database-transactions)
   - [Multiple Database Connections](#multiple-database-connections)

7. [Authentication & Authorization](#authentication--authorization)
   - [Authentication Scaffolding](#authentication-scaffolding)
   - [Laravel Sanctum](#laravel-sanctum)
   - [Laravel Passport](#laravel-passport)
   - [Laravel Fortify](#laravel-fortify)
   - [Gates and Policies](#gates-and-policies)
   - [Role-Based Access Control](#role-based-access-control)

8. [Caching & Performance](#caching--performance)
   - [Cache Drivers](#cache-drivers)
   - [Query Caching](#query-caching)
   - [Full Page Caching](#full-page-caching)
   - [Route Caching](#route-caching)
   - [View Caching](#view-caching)
   - [Artisan Optimization Commands](#artisan-optimization-commands)

9. [Testing in Laravel](#testing-in-laravel)
   - [PHPUnit Configuration](#phpunit-configuration)
   - [Feature vs Unit Testing](#feature-vs-unit-testing)
   - [HTTP Tests](#http-tests)
   - [Database Testing](#database-testing)
   - [Mocking](#mocking)
   - [Test Coverage](#test-coverage)
   - [TDD Approaches](#tdd-approaches)

10. [API Development](#api-development)
    - [RESTful API Design](#restful-api-design)
    - [API Resources and Transformations](#api-resources-and-transformations)
    - [API Versioning Strategies](#api-versioning-strategies)
    - [API Authentication](#api-authentication)
    - [Rate Limiting](#rate-limiting)
    - [API Documentation](#api-documentation)

11. [Advanced Laravel Concepts](#advanced-laravel-concepts)
    - [Laravel Queues](#laravel-queues)
    - [Laravel Websockets](#laravel-websockets)
    - [Laravel Socialite](#laravel-socialite)
    - [Laravel Horizon](#laravel-horizon)
    - [Laravel Echo](#laravel-echo)
    - [Laravel Dusk](#laravel-dusk)
    - [Package Development](#package-development)

12. [Design Patterns in Laravel](#design-patterns-in-laravel)
    - [Repository Pattern](#repository-pattern)
    - [Service Layer](#service-layer)
    - [Factory Pattern](#factory-pattern)
    - [Strategy Pattern](#strategy-pattern)
    - [Observer Pattern](#observer-pattern)
    - [Decorator Pattern](#decorator-pattern)

13. [Security Best Practices](#security-best-practices)
    - [CSRF Protection](#csrf-protection)
    - [XSS Prevention](#xss-prevention)
    - [SQL Injection Prevention](#sql-injection-prevention)
    - [Mass Assignment Protection](#mass-assignment-protection)
    - [File Upload Security](#file-upload-security)
    - [Authentication Security](#authentication-security)

14. [Deployment & DevOps](#deployment--devops)
    - [Deployment Strategies](#deployment-strategies)
    - [Server Requirements](#server-requirements)
    - [CI/CD Pipeline Setup](#cicd-pipeline-setup)
    - [Environment Configuration](#environment-configuration)
    - [Monitoring and Logging](#monitoring-and-logging)
    - [Scaling Laravel Applications](#scaling-laravel-applications)

15. [Laravel Ecosystem](#laravel-ecosystem)
    - [Laravel Nova](#laravel-nova)
    - [Laravel Vapor](#laravel-vapor)
    - [Laravel Forge](#laravel-forge)
    - [Laravel Envoyer](#laravel-envoyer)
    - [Laravel Telescope](#laravel-telescope)
    - [Laravel Jetstream](#laravel-jetstream)

## PHP Fundamentals

### Object-Oriented Programming in PHP

Understanding object-oriented programming (OOP) principles is essential for any senior PHP developer:

1. **Classes and Objects**:
   - Classes are blueprints for objects
   - Objects are instances of classes
   - Properties represent state
   - Methods represent behavior

   ```php
   class User 
   {
       private $name;
       
       public function __construct(string $name) 
       {
           $this->name = $name;
       }
       
       public function getName(): string 
       {
           return $this->name;
       }
   }
   
   $user = new User('John Doe');
   echo $user->getName(); // Outputs: John Doe
   ```

2. **Encapsulation**:
   - Bundling data and methods that operate on that data
   - Access modifiers: `public`, `protected`, `private`
   - Getters and setters control access to properties

   ```php
   class BankAccount 
   {
       private $balance = 0;
       
       public function deposit(float $amount): void 
       {
           if ($amount <= 0) {
               throw new InvalidArgumentException('Amount must be positive');
           }
           $this->balance += $amount;
       }
       
       public function getBalance(): float 
       {
           return $this->balance;
       }
   }
   ```

3. **Inheritance**:
   - Creating new classes from existing ones
   - Use `extends` keyword to inherit
   - Child classes inherit properties and methods from parent

   ```php
   class Person 
   {
       protected $name;
       
       public function __construct(string $name) 
       {
           $this->name = $name;
       }
   }
   
   class Employee extends Person 
   {
       private $employeeId;
       
       public function __construct(string $name, string $employeeId) 
       {
           parent::__construct($name);
           $this->employeeId = $employeeId;
       }
   }
   ```

4. **Polymorphism**:
   - Objects of different classes can be treated as objects of a common parent class
   - Implemented via inheritance and interfaces
   - Method overriding allows child classes to provide specific implementations

   ```php
   interface PaymentGateway 
   {
       public function processPayment(float $amount): bool;
   }
   
   class StripeGateway implements PaymentGateway 
   {
       public function processPayment(float $amount): bool 
       {
           // Stripe-specific implementation
           return true;
       }
   }
   
   class PayPalGateway implements PaymentGateway 
   {
       public function processPayment(float $amount): bool 
       {
           // PayPal-specific implementation
           return true;
       }
   }
   
   function checkout(PaymentGateway $gateway, float $amount) 
   {
       return $gateway->processPayment($amount);
   }
   ```

5. **Abstraction**:
   - Hide complex implementation details, expose only necessary features
   - Abstract classes can't be instantiated, only extended
   - Abstract methods must be implemented by child classes

   ```php
   abstract class Shape 
   {
       abstract public function calculateArea(): float;
       
       public function printArea(): void 
       {
           echo "Area: " . $this->calculateArea();
       }
   }
   
   class Circle extends Shape 
   {
       private $radius;
       
       public function __construct(float $radius) 
       {
           $this->radius = $radius;
       }
       
       public function calculateArea(): float 
       {
           return pi() * $this->radius * $this->radius;
       }
   }
   ```

6. **Interfaces**:
   - Define contracts that classes must implement
   - Cannot contain implementation, only method signatures
   - Classes can implement multiple interfaces

   ```php
   interface Loggable 
   {
       public function log(string $message): void;
   }
   
   interface Serializable 
   {
       public function serialize(): string;
       public function unserialize(string $data): void;
   }
   
   class User implements Loggable, Serializable 
   {
       // Must implement all methods from both interfaces
   }
   ```

7. **Traits**:
   - Reuse code across multiple class hierarchies
   - Horizontal code sharing mechanism
   - Reduce code duplication without deep inheritance

   ```php
   trait Timestampable 
   {
       private $createdAt;
       private $updatedAt;
       
       public function setCreatedAt(): void 
       {
           $this->createdAt = new DateTime();
       }
       
       public function setUpdatedAt(): void 
       {
           $this->updatedAt = new DateTime();
       }
   }
   
   class Article 
   {
       use Timestampable;
       
       // Article-specific code
   }
   
   class Comment 
   {
       use Timestampable;
       
       // Comment-specific code
   }
   ```

### PHP 7+ Features

PHP 7 introduced significant improvements to the language. Key features include:

1. **Scalar Type Declarations**:
   - Enforce parameter and return types
   - Types: `string`, `int`, `float`, `bool`
   - Strict typing with `declare(strict_types=1);`

   ```php
   declare(strict_types=1);
   
   function add(int $a, int $b): int 
   {
       return $a + $b;
   }
   
   // This will work
   echo add(5, 10); // 15
   
   // This will throw a TypeError
   echo add('5', 10);
   ```

2. **Return Type Declarations**:
   - Specify the return type of functions and methods
   - Helps with code documentation and prevents bugs

   ```php
   function getUserName(int $userId): ?string 
   {
       $user = findUser($userId);
       return $user ? $user->name : null;
   }
   ```

3. **Null Coalescing Operator** `??`:
   - Shorthand for checking if a value is null
   - Returns first operand if not null, otherwise returns second operand

   ```php
   // Old way
   $username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
   
   // With null coalescing operator
   $username = $_GET['user'] ?? 'nobody';
   
   // Can be chained
   $username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';
   ```

4. **Spaceship Operator** `<=>`:
   - Combined comparison operator
   - Returns 0 if values are equal, 1 if first is greater, -1 if second is greater

   ```php
   // Sorting an array
   usort($array, function ($a, $b) {
       return $a <=> $b;
   });
   
   // Manual comparison
   echo 1 <=> 1; // 0
   echo 1 <=> 2; // -1
   echo 2 <=> 1; // 1
   ```

5. **Anonymous Classes**:
   - Create class objects without defining a formal class
   - Useful for one-off implementations

   ```php
   $logger = new class implements Logger {
       public function log(string $message): void 
       {
           echo $message;
       }
   };
   
   $logger->log('Test message');
   ```

6. **Group Use Declarations**:
   - Import multiple classes from the same namespace
   - Cleaner import statements

   ```php
   // Old way
   use App\Models\User;
   use App\Models\Post;
   use App\Models\Comment;
   
   // With group use declarations
   use App\Models\{User, Post, Comment};
   ```

7. **Generator Return Expressions**:
   - Allow generators to return final values
   - Access with `getReturn()` after completion

   ```php
   function getRange($max) 
   {
       for ($i = 0; $i < $max; $i++) {
           yield $i;
       }
       return $max;
   }
   
   $range = getRange(10);
   foreach ($range as $value) {
       echo $value . " ";
   }
   echo "Final: " . $range->getReturn(); // Final: 10
   ```

8. **Error Handling Improvements**:
   - Many fatal errors converted to exceptions
   - New `Error` class hierarchy
   - Can catch previously uncatchable errors

   ```php
   try {
       // Code that might trigger an error
       nonExistentFunction();
   } catch (Error $e) {
       echo "Caught error: " . $e->getMessage();
   }
   ```

### PHP 8+ Features

PHP 8 introduced even more powerful features:

1. **Union Types**:
   - Specify multiple possible types for parameters and return values

   ```php
   function formatValue(string|int|float $value): string 
   {
       return (string) $value;
   }
   ```

2. **Named Arguments**:
   - Specify argument names when calling functions
   - Allows skipping optional parameters
   - Improves readability

   ```php
   function createUser(string $name, string $email, ?string $phone = null, bool $admin = false) 
   {
       // Implementation
   }
   
   // Old way
   createUser('John Doe', 'john@example.com', null, true);
   
   // With named arguments
   createUser(
       name: 'John Doe',
       email: 'john@example.com',
       admin: true // Skip phone parameter
   );
   ```

3. **Attributes (Annotations)**:
   - Add metadata to classes, methods, properties, etc.
   - Replaces PHPDoc annotations with native syntax
   - Used for extending functionality without modifying code

   ```php
   // Define a custom attribute
   #[Attribute]
   class Route 
   {
       public function __construct(public string $path) {}
   }
   
   // Use the attribute
   class UserController 
   {
       #[Route('/users')]
       public function index() 
       {
           // Implementation
       }
   }
   ```

4. **Constructor Property Promotion**:
   - Combine property declaration and constructor initialization
   - Reduces boilerplate code

   ```php
   // Old way
   class User 
   {
       private string $name;
       private string $email;
       
       public function __construct(string $name, string $email) 
       {
           $this->name = $name;
           $this->email = $email;
       }
   }
   
   // With constructor property promotion
   class User 
   {
       public function __construct(
           private string $name,
           private string $email
       ) {}
   }
   ```

5. **Match Expression**:
   - More powerful and safer version of switch
   - Returns a value and uses strict comparison
   - No fall-through, no need for break statements

   ```php
   // Old way with switch
   switch ($status) {
       case 'paid':
           $statusCode = 100;
           break;
       case 'pending':
           $statusCode = 200;
           break;
       default:
           $statusCode = 300;
           break;
   }
   
   // With match expression
   $statusCode = match ($status) {
       'paid' => 100,
       'pending' => 200,
       default => 300,
   };
   ```

6. **Nullsafe Operator** `?->`:
   - Chain method calls without worrying about null values
   - Similar to the null coalescing operator but for method calls

   ```php
   // Old way
   $country = null;
   if ($session !== null) {
       $user = $session->user;
       if ($user !== null) {
           $address = $user->getAddress();
           if ($address !== null) {
               $country = $address->country;
           }
       }
   }
   
   // With nullsafe operator
   $country = $session?->user?->getAddress()?->country;
   ```

7. **String Functions with Needle On End**:
   - Functions like `str_contains()`, `str_starts_with()`, `str_ends_with()`
   - More intuitive string manipulation

   ```php
   // Check if string contains substring
   if (str_contains($haystack, $needle)) {
       // Code
   }
   
   // Check if string starts with substring
   if (str_starts_with($haystack, $needle)) {
       // Code
   }
   
   // Check if string ends with substring
   if (str_ends_with($haystack, $needle)) {
       // Code
   }
   ```

8. **New `mixed` Type**:
   - Represents multiple possible types
   - More explicit than omitting type completely

   ```php
   function process(mixed $data): mixed 
   {
       // Can accept any type of data
       return $data;
   }
   ```

### Type System and Type Hints

PHP has evolved to include a robust type system:

1. **Scalar Type Hints**:
   - Basic types: `int`, `float`, `string`, `bool`
   - Enable strict type checking with `declare(strict_types=1);`

   ```php
   declare(strict_types=1);
   
   function calculateArea(float $width, float $height): float 
   {
       return $width * $height;
   }
   ```

2. **Compound Types**:
   - `array` - for array values
   - `iterable` - for anything that can be looped through
   - `callable` - for functions and methods

   ```php
   function processItems(iterable $items): array 
   {
       $result = [];
       foreach ($items as $item) {
           $result[] = $item;
       }
       return $result;
   }
   
   function executeFunction(callable $callback, $parameter) 
   {
       return $callback($parameter);
   }
   ```

3. **Class and Interface Types**:
   - Use class names as type hints
   - Enforce specific object types
   - Include interfaces for polymorphism

   ```php
   function saveUser(User $user, DatabaseInterface $db): bool 
   {
       return $db->save($user);
   }
   ```

4. **Union Types** (PHP 8+):
   - Accept multiple possible types
   - Separated by pipe (`|`)

   ```php
   function process(string|int|float $value): string|int 
   {
       // Process value
       return $processed;
   }
   ```

5. **Intersection Types** (PHP 8.1+):
   - Value must satisfy multiple type constraints
   - Mainly used with interfaces
   - Separated by ampersand (`&`)

   ```php
   function processData(Serializable & Countable $data) 
   {
       // $data must implement both Serializable and Countable
   }
   ```

6. **Nullable Types**:
   - Add `?` before type to allow null values
   - Shorthand for union with `null`

   ```php
   function findUser(int $id): ?User 
   {
       // Return User or null if not found
   }
   
   // Equivalent to:
   // function findUser(int $id): User|null
   ```

7. **void Return Type**:
   - Function doesn't return a value
   - Any return statement must be empty

   ```php
   function logMessage(string $message): void 
   {
       // Log the message
       // No return value
   }
   ```

8. **never Return Type** (PHP 8.1+):
   - Function never returns (throws exception or exits)
   - For functions that don't complete normally

   ```php
   function redirect(string $url): never 
   {
       header("Location: $url");
       exit();
   }
   
   function throwError(string $message): never 
   {
       throw new Exception($message);
   }
   ```

9. **mixed Type** (PHP 8+):
   - Represents any type
   - More explicit than omitting type

   ```php
   function handleData(mixed $data): mixed 
   {
       // Can accept and return any type
   }
   ```

10. **Type Variance** (PHP 7.4+):
    - Covariant returns: Child method can return more specific type
    - Contravariant parameters: Child method can accept less specific type

    ```php
    interface Animal {
        public function feed(): Food;
    }
    
    class Dog implements Animal {
        // Covariant return - DogFood is more specific than Food
        public function feed(): DogFood {
            return new DogFood();
        }
    }
    ```

### Error Handling and Exceptions

Proper error handling is a critical skill for senior PHP developers:

1. **Exception Hierarchy**:
   - `Throwable` interface - base for all exceptions and errors
   - `Exception` - base class for exceptions
   - `Error` - base class for internal PHP errors

   ```php
   try {
       // Code that might throw an exception
   } catch (InvalidArgumentException $e) {
       // Handle specific exception
   } catch (Exception $e) {
       // Handle other exceptions
   } catch (Throwable $e) {
       // Handle PHP errors
   }
   ```

2. **Custom Exceptions**:
   - Extend built-in exception classes
   - Provide more context for error handling
   - Allow catching specific error types

   ```php
   class PaymentFailedException extends Exception 
   {
       protected $paymentId;
       
       public function __construct(string $message, int $paymentId, int $code = 0) 
       {
           parent::__construct($message, $code);
           $this->paymentId = $paymentId;
       }
       
       public function getPaymentId(): int 
       {
           return $this->paymentId;
       }
   }
   
   try {
       // Payment processing code
       throw new PaymentFailedException("Payment declined", $paymentId);
   } catch (PaymentFailedException $e) {
       logPaymentError($e->getPaymentId(), $e->getMessage());
   }
   ```

3. **try/catch/finally**:
   - `try` contains code that might throw exceptions
   - `catch` handles specific exception types
   - `finally` executes regardless of whether an exception occurred

   ```php
   function processFile(string $path): void 
   {
       $file = null;
       try {
           $file = fopen($path, 'r');
           // Process file
       } catch (Exception $e) {
           // Handle exception
           log_error($e->getMessage());
       } finally {
           // Always close the file
           if ($file) {
               fclose($file);
           }
       }
   }
   ```

4. **Exception Chaining**:
   - Pass previous exception as third parameter
   - Preserves original error context
   - Useful for repackaging exceptions

   ```php
   try {
       // Database operation
   } catch (PDOException $e) {
       throw new DatabaseException("Failed to save record", 500, $e);
   }
   ```

5. **Global Exception Handler**:
   - Set a global handler for uncaught exceptions
   - Last line of defense for error handling
   - Convert exceptions to user-friendly errors

   ```php
   function globalExceptionHandler(Throwable $e): void 
   {
       // Log error
       error_log($e->getMessage());
       
       // Present user-friendly message
       if (APP_DEBUG) {
           echo "Error: " . $e->getMessage();
       } else {
           echo "An unexpected error occurred. Please try again later.";
       }
       
       exit(1);
   }
   
   set_exception_handler('globalExceptionHandler');
   ```

6. **Error Reporting and Logging**:
   - Configure error display and logging
   - Different settings for development and production
   - Use monolog or other logging libraries

   ```php
   // Development environment
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   
   // Production environment
   ini_set('display_errors', 0);
   error_reporting(E_ERROR | E_PARSE);
   
   // Custom error handling
   function customErrorHandler($errno, $errstr, $errfile, $errline): bool 
   {
       if (!(error_reporting() & $errno)) {
           // Error is not in the error_reporting level
           return false;
       }
       
       $errorType = match($errno) {
           E_ERROR, E_USER_ERROR => 'Fatal Error',
           E_WARNING, E_USER_WARNING => 'Warning',
           E_NOTICE, E_USER_NOTICE => 'Notice',
           default => 'Unknown Error'
       };
       
       logError("$errorType: $errstr in $errfile on line $errline");
       
       return true; // Don't execute PHP's internal error handler
   }
   
   set_error_handler('customErrorHandler');
   ```

7. **Graceful Degradation**:
   - Plan for failures in external services
   - Have fallback mechanisms
   - Prevent cascading failures

   ```php
   function getUserData(int $userId): array 
   {
       try {
           return $this->userApiService->getData($userId);
       } catch (ApiTimeoutException $e) {
           // Log the error
           Log::error("API timeout: " . $e->getMessage());
           
           // Return cached data as fallback
           return $this->userCache->get($userId, []);
       } catch (ApiException $e) {
           // Log the error
           Log::error("API error: " . $e->getMessage());
           
           // Return a minimal placeholder
           return [
               'id' => $userId,
               'name' => 'Unknown User',
               'status' => 'error'
           ];
       }
   }
   ```

### PHP Memory Management

Understanding PHP's memory management is essential for optimizing application performance:

1. **Memory Allocation**:
   - PHP allocates memory automatically
   - `memory_limit` directive in php.ini controls maximum allocation
   - Monitor with `memory_get_usage()` and `memory_get_peak_usage()`

   ```php
   // Check current memory usage
   echo "Current memory usage: " . memory_get_usage() / 1024 / 1024 . " MB\n";
   
   // Process large data
   $data = processLargeDataset();
   
   // Check peak memory usage
   echo "Peak memory usage: " . memory_get_peak_usage(true) / 1024 / 1024 . " MB\n";
   ```

2. **Garbage Collection**:
   - PHP uses reference counting for memory management
   - Circular references require cycle collector
   - Disable with `gc_disable()` during batch operations
   - Force with `gc_collect_cycles()`

   ```php
   // Disable garbage collection for batch process
   gc_disable();
   
   // Process large batch of data
   processLargeBatch();
   
   // Re-enable and force collection
   gc_enable();
   $freedMemory = gc_collect_cycles();
   echo "Freed memory blocks: $freedMemory\n";
   ```

3. **Variable Scope and Memory**:
   - Variables are freed when they go out of scope
   - Use `unset()` to explicitly free large variables
   - Be cautious with global variables and static properties

   ```php
   function processLargeFile(string $path): string 
   {
       // Read large file
       $content = file_get_contents($path);
       
       // Process content
       $result = doSomeProcessing($content);
       
       // Free memory
       unset($content);
       
       return $result;
   }
   ```

4. **Memory Leaks**:
   - Circular references can cause memory leaks
   - Long-running processes (CLI scripts, workers) most affected
   - Use weak references (PHP 7.4+) for circular dependencies

   ```php
   // Potential memory leak (circular reference)
   class ParentClass {
       public $child;
   }
   
   class ChildClass {
       public $parent;
   }
   
   $parent = new ParentClass();
   $child = new ChildClass();
   $parent->child = $child;
   $child->parent = $parent;
   
   // PHP 7.4+ solution with weak references
   class ChildClass {
       public WeakReference $parent;
   }
   
   $parent = new ParentClass();
   $child = new ChildClass();
   $parent->child = $child;
   $child->parent = WeakReference::create($parent);
   ```

5. **Memory-Efficient Data Structures**:
   - Use generators for large datasets
   - SplFixedArray for numerical indexed arrays
   - Consider specialized extensions for memory-intensive operations

   ```php
   // Using a generator to process large files line by line
   function readLargeFile(string $path) 
   {
       $handle = fopen($path, 'r');
       while (($line = fgets($handle)) !== false) {
           yield $line;
       }
       fclose($handle);
   }
   
   // Usage
   foreach (readLargeFile('large_log.txt') as $line) {
       processLine($line);
   }
   
   // SplFixedArray for memory efficiency
   $array = new SplFixedArray(1000000);
   for ($i = 0; $i < 1000000; $i++) {
       $array[$i] = $i;
   }
   ```

6. **Memory Profiling Tools**:
   - XDebug profiler
   - Blackfire.io
   - PHP Meminfo extension

   ```php
   // With XDebug
   // Profiling a specific code section
   xdebug_start_trace('/tmp/trace');
   
   // Run your code
   $result = processLargeDataset();
   
   // Stop profiling
   xdebug_stop_trace();
   
   // With Blackfire
   $probe = new \Blackfire\Probe();
   $probe->enable();
   
   // Run your code
   $result = processLargeDataset();
   
   $probe->disable();
   ```

7. **Preventing Memory Issues in Production**:
   - Set appropriate memory limits in php.ini
   - Implement batching for large data processing
   - Monitor memory usage trends
   - Implement circuit breakers for resource-intensive operations

   ```php
   // Batch processing example
   function processManyRecords(array $records, int $batchSize = 1000): void
   {
       $totalRecords = count($records);
       $batches = ceil($totalRecords / $batchSize);
       
       for ($i = 0; $i < $batches; $i++) {
           $batch = array_slice($records, $i * $batchSize, $batchSize);
           processBatch($batch);
           
           // Free memory
           unset($batch);
           gc_collect_cycles();
       }
   }
   ```

## Laravel Architecture

### Service Container

The Service Container is a powerful tool for managing class dependencies and performing dependency injection. It's the heart of Laravel's architecture:

1. **Basic Concept**:
   - Container resolves and manages class dependencies
   - Central registry for application components
   - Foundation for dependency injection

   ```php
   // Accessing the container
   $container = app();
   
   // Resolving a class from the container
   $service = app(PaymentService::class);
   ```

2. **Binding**:
   - Register classes or values in the container
   - Different binding types: singleton, instance, and more

   ```php
   // Simple binding
   app()->bind(PaymentGatewayInterface::class, StripeGateway::class);
   
   // Singleton binding (same instance every time)
   app()->singleton(UserRepository::class, function () {
       return new UserRepository(config('database.connections.mysql'));
   });
   
   // Instance binding (existing object)
   app()->instance('api-client', new ApiClient('api-key'));
   
   // Binding a primitive value
   app()->bind('api-key', function () {
       return config('services.api.key');
   });
   ```

3. **Contextual Binding**:
   - Bind different implementations based on context
   - Useful for resolving different implementations of the same interface

   ```php
   app()->when(UserController::class)
      ->needs(PaymentGatewayInterface::class)
      ->give(StripeGateway::class);
      
   app()->when(AdminController::class)
      ->needs(PaymentGatewayInterface::class)
      ->give(PayPalGateway::class);
   ```

4. **Automatic Resolution**:
   - Container automatically resolves concrete dependencies
   - Recursively resolves nested dependencies
   - Type-hinted constructor parameters are automatically injected

   ```php
   class UserService
   {
       public function __construct(
           private UserRepository $repository,
           private Logger $logger
       ) {}
   }
   
   // Laravel will automatically resolve UserRepository and Logger
   $userService = app(UserService::class);
   ```

5. **Tagged Services**:
   - Group related bindings with tags
   - Resolve all services with a specific tag

   ```php
   app()->tag([
       EmailNotifier::class, 
       SmsNotifier::class
   ], 'notifiers');
   
   // Resolve all notifiers
   $notifiers = app()->tagged('notifiers');
   ```

6. **Container Events**:
   - Listen for container resolution events
   - Useful for extending or decorating services

   ```php
   app()->resolving(Logger::class, function ($logger, $app) {
       // Called when container resolves any Logger instance
       $logger->pushHandler(new SyslogHandler('Laravel'));
   });
   ```

7. **Real-World Usage in Laravel**:
   - Route handlers (controllers, middleware)
   - Event listeners and observers
   - Queue jobs and commands
   - Service providers

   ```php
   // Injecting services into controllers
   public function store(Request $request, UserRepository $users)
   {
       $user = $users->create($request->validated());
   }
   ```

### Service Providers

Service Providers are the central place to configure your application, register bindings with the service container, and set up event listeners, middleware, and routes:

1. **Basic Structure**:
   - Register method for simple bindings
   - Boot method for using already registered services
   - Called during application bootstrap

   ```php
   namespace App\Providers;
   
   use Illuminate\Support\ServiceProvider;
   
   class AppServiceProvider extends ServiceProvider
   {
       public function register()
       {
           // Register bindings with the container
           $this->app->singleton(PaymentService::class, function ($app) {
               return new PaymentService($app['config']['payment']);
           });
       }
       
       public function boot()
       {
           // Bootstrap services, already registered services can be used here
           View::composer('dashboard', DashboardComposer::class);
       }
   }
   ```

2. **Types of Service Providers**:
   - **Core providers**: Laravel's internal providers
   - **Package providers**: From third-party packages
   - **Application providers**: Custom application providers

3. **Deferred Providers**:
   - Loaded only when their services are needed
   - Improve application performance
   - Must implement list of provided services

   ```php
   namespace App\Providers;
   
   use Illuminate\Support\ServiceProvider;
   
   class ReportingServiceProvider extends ServiceProvider
   {
       protected $defer = true;
       
       public function register()
       {
           $this->app->singleton(ReportGenerator::class, function () {
               return new ReportGenerator();
           });
       }
       
       public function provides()
       {
           return [ReportGenerator::class];
       }
   }
   ```

4. **Registering Providers**:
   - Add to providers array in config/app.php
   - Auto-discovery in Laravel packages

   ```php
   // In config/app.php
   'providers' => [
       // Laravel Framework Service Providers...
       
       // Application Service Providers...
       App\Providers\AppServiceProvider::class,
       App\Providers\EventServiceProvider::class,
       App\Providers\RouteServiceProvider::class,
       App\Providers\CustomServiceProvider::class,
   ],
   ```

5. **Common Use Cases**:
   - Bind interfaces to implementations
   - Set up event listeners and observers
   - Register custom validation rules
   - Configure macros and extensions
   - Register view composers

   ```php
   public function boot()
   {
       // Register validation rule
       Validator::extend('strong_password', function ($attribute, $value, $parameters) {
           return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $value);
       });
       
       // Register collection macro
       Collection::macro('toUpper', function () {
           return $this->map(function ($value) {
               return Str::upper($value);
           });
       });
       
       // Set up event listeners
       Event::listen(UserRegistered::class, SendWelcomeEmail::class);
   }
   ```

6. **Custom Command Registration**:
   - Register custom Artisan commands

   ```php
   public function boot()
   {
       if ($this->app->runningInConsole()) {
           $this->commands([
               GenerateReport::class,
               CleanupFiles::class,
           ]);
       }
   }
   ```

7. **Publishing Assets and Configuration**:
   - Make package assets available for publishing

   ```php
   public function boot()
   {
       $this->publishes([
           __DIR__.'/../config/package.php' => config_path('package.php'),
       ], 'config');
       
       $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/package'),
       ], 'views');
   }
   ```

### Facades

Facades provide a static interface to classes that are available in the service container:

1. **Basic Concept**:
   - Static proxy to underlying classes in the container
   - Provide clean, expressive syntax
   - Not actual static methods (makes testing easier)

   ```php
   use Illuminate\Support\Facades\Cache;
   
   // Using a facade
   Cache::put('key', 'value', 60);
   
   // Equivalent to:
   app('cache')->put('key', 'value', 60);
   ```

2. **How Facades Work**:
   - Magic `__callStatic()` method
   - Resolve the underlying instance from container
   - Forward method calls to the resolved instance

   ```php
   // Simplified facade implementation
   class Cache extends Facade
   {
       protected static function getFacadeAccessor()
       {
           return 'cache';
       }
   }
   ```

3. **Common Laravel Facades**:
   - `Route`, `Auth`, `DB`, `Cache`, `Config`
   - `Session`, `Storage`, `Mail`, `Validator`
   - `Event`, `Log`, `Queue`, `Schema`

   ```php
   use Illuminate\Support\Facades\Route;
   use Illuminate\Support\Facades\DB;
   
   Route::get('/users', 'UserController@index');
   
   $users = DB::table('users')->where('active', 1)->get();
   ```

4. **Real-Time Facades**:
   - Create facades for any class on the fly
   - Prefix the namespace with `Facades\\`

   ```php
   use Facades\App\Services\PaymentProcessor;
   
   // Using a real-time facade
   PaymentProcessor::process($payment);
   
   // Equivalent to:
   app(PaymentProcessor::class)->process($payment);
   ```

5. **Facade vs. Dependency Injection**:
   - Facades: Easy to use, but hide dependencies
   - DI: More explicit, better for testing
   - Both can be used appropriately

   ```php
   // Using facade
   Cache::get('key');
   
   // Using dependency injection
   public function __construct(
       private \Illuminate\Contracts\Cache\Repository $cache
   ) {}
   
   public function method()
   {
       $this->cache->get('key');
   }
   ```

6. **Testing with Facades**:
   - Facades can be mocked with `shouldReceive()`
   - No need for dependency injection in tests

   ```php
   // Testing with mocked facade
   Cache::shouldReceive('get')
       ->with('user:profile:1')
       ->once()
       ->andReturn(['name' => 'John']);
   
   // Run code that uses Cache facade
   $result = $controller->show(1);
   
   // Assert the expected result
   $this->assertEquals(['name' => 'John'], $result);
   ```

7. **Custom Facades**:
   - Create custom facades for application services
   - Useful for frequently accessed services

   ```php
   namespace App\Facades;
   
   use Illuminate\Support\Facades\Facade;
   
   class Payment extends Facade
   {
       protected static function getFacadeAccessor()
       {
           return 'payment';
       }
   }
   
   // In a service provider
   $this->app->bind('payment', function () {
       return new \App\Services\PaymentService();
   });
   
   // Usage
   use App\Facades\Payment;
   
   Payment::process($order);
   ```

### Contracts

Laravel Contracts are a set of interfaces that define the core services provided by the framework:

1. **Basic Concept**:
   - Interfaces defining core framework services
   - Loose coupling between components
   - Improved testability and flexibility

   ```php
   use Illuminate\Contracts\Cache\Repository as CacheContract;
   
   class UserService
   {
       public function __construct(
           private CacheContract $cache
       ) {}
       
       public function getUser($id)
       {
           return $this->cache->remember("user.$id", 60, function () use ($id) {
               return User::find($id);
           });
       }
   }
   ```

2. **Key Contracts in Laravel**:
   - `Illuminate\Contracts\Auth\Guard`
   - `Illuminate\Contracts\Cache\Repository`
   - `Illuminate\Contracts\Queue\Queue`
   - `Illuminate\Contracts\Mail\Mailer`
   - `Illuminate\Contracts\Filesystem\Filesystem`

3. **Contract vs. Facade**:
   - Both access the same underlying services
   - Contracts require explicit dependency injection
   - Facades provide static interface

   ```php
   // Using contract with DI
   public function __construct(
       private \Illuminate\Contracts\Mail\Mailer $mailer
   ) {}
   
   public function sendWelcome(User $user)
   {
       $this->mailer->to($user->email)->send(new WelcomeEmail($user));
   }
   
   // Using facade
   use Illuminate\Support\Facades\Mail;
   
   public function sendWelcome(User $user)
   {
       Mail::to($user->email)->send(new WelcomeEmail($user));
   }
   ```

4. **Benefits of Using Contracts**:
   - Explicit dependencies
   - Easier to switch implementations
   - Better for testing (easier to mock interfaces)
   - Clear documentation of requirements

5. **Creating Custom Contracts**:
   - Define custom interfaces for your services
   - Bind implementations in service providers

   ```php
   // Define contract
   namespace App\Contracts;
   
   interface PaymentProcessor
   {
       public function charge(array $data): bool;
       public function refund(string $transactionId): bool;
   }
   
   // Implement contract
   namespace App\Services;
   
   use App\Contracts\PaymentProcessor;
   
   class StripePaymentProcessor implements PaymentProcessor
   {
       public function charge(array $data): bool
       {
           // Implementation
       }
       
       public function refund(string $transactionId): bool
       {
           // Implementation
       }
   }
   
   // Register in service provider
   $this->app->bind(
       \App\Contracts\PaymentProcessor::class,
       \App\Services\StripePaymentProcessor::class
   );
   ```

6. **Contextual Binding with Contracts**:
   - Bind different implementations based on context
   - Useful for environment-specific services

   ```php
   $this->app->when(ProductionEnvironment::class)
       ->needs(PaymentProcessor::class)
       ->give(StripePaymentProcessor::class);
   
   $this->app->when(DevelopmentEnvironment::class)
       ->needs(PaymentProcessor::class)
       ->give(MockPaymentProcessor::class);
   ```

7. **Testing with Contracts**:
   - Create mock implementations for testing
   - Use dependency injection to swap implementations

   ```php
   public function testUserService()
   {
       // Create mock cache
       $cacheMock = $this->createMock(CacheContract::class);
       $cacheMock->method('remember')
           ->willReturn(['id' => 1, 'name' => 'John']);
       
       // Inject mock into the service
       $service = new UserService($cacheMock);
       
       // Test the service
       $result = $service->getUser(1);
       
       $this->assertEquals('John', $result['name']);
   }
   ```

### Laravel Lifecycle

Understanding the Laravel request lifecycle is crucial for a senior PHP developer:

1. **Entry Point**:
   - All requests enter through public/index.php
   - Sets up autoloading with Composer
   - Creates application instance
   - Processes the request and sends response

2. **Application Instance Creation**:
   - `bootstrap/app.php` creates application container
   - Binds core service providers
   - Returns application instance

   ```php
   // bootstrap/app.php
   $app = new Illuminate\Foundation\Application(
       $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
   );
   
   $app->singleton(
       Illuminate\Contracts\Http\Kernel::class,
       App\Http\Kernel::class
   );
   
   $app->singleton(
       Illuminate\Contracts\Console\Kernel::class,
       App\Console\Kernel::class
   );
   
   $app->singleton(
       Illuminate\Contracts\Debug\ExceptionHandler::class,
       App\Exceptions\Handler::class
   );
   
   return $app;
   ```

3. **HTTP Kernel Handling**:
   - Takes request from index.php
   - Loads service providers
   - Bootstraps application components
   - Passes request through middleware
   - Dispatches request to router

   ```php
   // Process flow in index.php
   $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
   
   $response = $kernel->handle(
       $request = Illuminate\Http\Request::capture()
   );
   
   $response->send();
   
   $kernel->terminate($request, $response);
   ```

4. **Service Provider Loading**:
   - Load and register service providers from config
   - Two stages: register and boot
   - Register: Bind services to container
   - Boot: Services are configured and ready to use

5. **Request Through Middleware**:
   - Global middleware runs first
   - Then route group middleware
   - Finally route-specific middleware
   - Middleware can modify request or response
   - Can terminate request early

   ```php
   protected $middleware = [
       \App\Http\Middleware\TrustProxies::class,
       \App\Http\Middleware\CheckForMaintenanceMode::class,
       \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
       \App\Http\Middleware\TrimStrings::class,
       \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
   ];
   ```

6. **Route Dispatching**:
   - Router matches URL to defined routes
   - Resolves controller or closure
   - Executes requested action
   - Returns response object

   ```php
   // Route definition
   Route::get('/users/{id}', [UserController::class, 'show']);
   
   // Controller action
   public function show($id)
   {
       return User::findOrFail($id);
   }
   ```

7. **Response Sending**:
   - Controller returns response (or data converted to response)
   - Response flows back through middleware
   - Kernel sends response to client
   - Kernel terminates: runs cleanup tasks

   ```php
   // Response and termination in index.php
   $response->send();
   
   $kernel->terminate($request, $response);
   ```

8. **Service Container Throughout Lifecycle**:
   - Resolves dependencies in controllers, middleware, etc.
   - Manages singletons and shared instances
   - Central to Laravel's flexibility

9. **Events During Lifecycle**:
   - Various events are fired during lifecycle
   - Can hook into these events with listeners
   - Examples: `booting`, `booted`, `composing: view`

   ```php
   Event::listen('auth.login', function ($user) {
       // React to user login
   });
   ```

10. **Console Application Lifecycle**:
   - Different entry point for console commands
   - Uses Console Kernel instead of HTTP Kernel
   - Similar bootstrapping process
   - Different middleware system (input/output)

### Directory Structure

Laravel follows a convention-over-configuration approach with its directory structure. Understanding this structure is essential:

1. **App Directory**:
   - Contains core application code
   - Organized into subdirectories by type
   - Main directories: Http, Models, Providers, Console

   ```
   app/
   ├── Console/          # Custom Artisan commands
   ├── Events/           # Event classes
   ├── Exceptions/       # Exception handlers
   ├── Http/             # Controllers, Middleware, Requests
   │   ├── Controllers/
   │   ├── Middleware/
   │   └── Requests/
   ├── Jobs/             # Queueable jobs
   ├── Listeners/        # Event listeners
   ├── Models/           # Eloquent models
   ├── Policies/         # Authorization policies
   ├── Providers/        # Service providers
   └── Services/         # Application services
   ```

2. **Config Directory**:
   - Contains configuration files
   - Environment-specific config with .env file
   - Accessible via Config facade or `config()` helper

   ```
   config/
   ├── app.php           # Application config
   ├── auth.php          # Authentication config
   ├── broadcasting.php  # Broadcasting config
   ├── cache.php         # Cache config
   ├── database.php      # Database config
   ├── filesystems.php   # Filesystem config
   ├── mail.php          # Mail config
   ├── queue.php         # Queue config
   ├── services.php      # Third-party services
   └── ...
   ```

3. **Database Directory**:
   - Contains migrations, seeders, and factories
   - Organized by type and creation date

   ```
   database/
   ├── factories/        # Model factories
   ├── migrations/       # Database migrations
   └── seeders/          # Database seeders
   ```

4. **Public Directory**:
   - Web server's document root
   - Contains index.php entry point
   - Assets: CSS, JavaScript, images
   - Generated assets from build process

   ```
   public/
   ├── index.php         # Application entry point
   ├── favicon.ico
   ├── robots.txt
   ├── css/              # CSS files
   ├── js/               # JavaScript files
   └── storage/          # Symlink to storage/app/public
   ```

5. **Resources Directory**:
   - Contains uncompiled assets
   - Views, language files, SASS files
   - Source files before build processing

   ```
   resources/
   ├── css/              # CSS files
   ├── js/               # JavaScript files
   ├── lang/             # Language files
   └── views/            # Blade templates
   ```

6. **Routes Directory**:
   - Contains route definitions
   - Organized by type: web, api, console, channels

   ```
   routes/
   ├── api.php           # API routes
   ├── channels.php      # Broadcast channels
   ├── console.php       # Console routes
   └── web.php           # Web routes
   ```

7. **Storage Directory**:
   - Contains application-generated files
   - Logs, cache, compiled views, user uploads
   - Can be linked to public for user-facing files

   ```
   storage/
   ├── app/              # Application storage
   │   └── public/       # Public storage
   ├── framework/        # Framework storage
   │   ├── cache/
   │   ├── sessions/
   │   └── views/
   └── logs/             # Log files
   ```

8. **Tests Directory**:
   - Contains automated tests
   - Organized by test type: Feature, Unit
   - PHPUnit configuration

   ```
   tests/
   ├── Feature/          # Feature tests
   ├── Unit/             # Unit tests
   ├── CreatesApplication.php
   ├── TestCase.php
   └── ...
   ```

9. **Vendor Directory**:
   - Contains Composer dependencies
   - Third-party packages
   - Laravel framework itself
   - Not committed to version control

   ```
   vendor/
   ├── autoload.php      # Composer autoloader
   ├── bin/              # Executable binaries
   ├── composer/         # Composer files
   ├── laravel/          # Laravel framework
   └── ...               # Other dependencies
   ```

10. **Root Files**:
   - Configuration and metadata files
   - Project-level settings
   - Entry points and bootstrapping

    ```
    ├── .env              # Environment variables
    ├── .env.example      # Example environment file
    ├── .gitignore        # Git ignore file
    ├── artisan           # Artisan CLI
    ├── composer.json     # Composer dependencies
    ├── composer.lock     # Composer lock file
    ├── package.json      # Node.js dependencies
    ├── phpunit.xml       # PHPUnit configuration
    ├── README.md         # Project documentation
    └── webpack.mix.js    # Laravel Mix configuration
    ```

11. **Custom Directories**:
   - Additional project-specific directories
   - Common examples: Repositories, Services, helpers

    ```
    app/
    ├── Repositories/     # Repository pattern classes
    ├── Services/         # Business logic services
    ├── Traits/           # Reusable traits
    └── helpers.php       # Custom helper functions
    ```

## Routing & Middleware

### Route Types and Registration

Laravel provides a flexible routing system to define how your application responds to HTTP requests:

1. **Basic Route Registration**:
   - Define routes in route files
   - Route verb methods match HTTP methods
   - Routes can point to controller actions or closures

   ```php
   // Simple route with closure
   Route::get('/welcome', function () {
       return view('welcome');
   });
   
   // Route pointing to controller action
   Route::post('/users', [UserController::class, 'store']);
   ```

2. **HTTP Verb Methods**:
   - GET, POST, PUT, PATCH, DELETE, OPTIONS
   - Match specific HTTP methods
   - Use `match` for multiple methods or `any` for all methods

   ```php
   Route::get('/users', [UserController::class, 'index']);
   Route::post('/users', [UserController::class, 'store']);
   Route::put('/users/{id}', [UserController::class, 'update']);
   Route::delete('/users/{id}', [UserController::class, 'destroy']);
   
   // Multiple HTTP verbs
   Route::match(['get', 'post'], '/users/search', [UserController::class, 'search']);
   
   // Any HTTP verb
   Route::any('/users/proxy', [UserController::class, 'proxy']);
   ```

3. **Route Groups**:
   - Group routes with shared attributes
   - Common uses: middleware, prefixes, namespaces, names

   ```php
   // Group with middleware and prefix
   Route::middleware(['auth'])->prefix('admin')->group(function () {
       Route::get('/dashboard', [AdminController::class, 'dashboard']);
       Route::get('/users', [AdminController::class, 'users']);
   });
   
   // Group with name prefix
   Route::name('admin.')->group(function () {
       Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
           ->name('dashboard'); // Results in "admin.dashboard"
   });
   ```

4. **Route Parameters**:
   - Dynamic segments in URLs
   - Passed to controller methods in order
   - Can be optional with `?` suffix

   ```php
   // Required parameter
   Route::get('/users/{id}', [UserController::class, 'show']);
   
   // Optional parameter
   Route::get('/users/{id?}', [UserController::class, 'index']);
   
   // Multiple parameters
   Route::get('/posts/{post}/comments/{comment}', [CommentController::class, 'show']);
   ```

5. **Named Routes**:
   - Assign names to routes for easy referencing
   - Generate URLs using route names
   - Avoid hardcoding URLs in views and code

   ```php
   // Naming a route
   Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
   
   // Using named routes
   $url = route('profile'); // Generates: /profile
   
   // With parameters
   Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
   $url = route('users.show', ['id' => 1]); // Generates: /users/1
   ```

6. **Route Caching**:
   - Improves performance in production
   - Command: `php artisan route:cache`
   - Must be cleared after route changes: `php artisan route:clear`

7. **Route Files**:
   - `routes/web.php` - Web routes with session, CSRF
   - `routes/api.php` - API routes with rate limiting
   - `routes/console.php` - Custom Artisan commands
   - `routes/channels.php` - WebSocket channels

   ```php
   // api.php - all routes prefixed with /api
   Route::middleware('auth:api')->get('/user', function (Request $request) {
       return $request->user();
   });
   
   // web.php - includes session and CSRF protection
   Route::middleware(['auth'])->get('/dashboard', function () {
       return view('dashboard');
   });
   ```

8. **Resource Routes**:
   - Quickly define CRUD routes
   - Follow RESTful conventions
   - Can customize included routes

   ```php
   // Full resource
   Route::resource('photos', PhotoController::class);
   
   // Only specific actions
   Route::resource('photos', PhotoController::class)
       ->only(['index', 'show']);
   
   // Exclude specific actions
   Route::resource('photos', PhotoController::class)
       ->except(['destroy']);
   ```

9. **API Resource Routes**:
   - Similar to resource routes but for APIs
   - No routes for create or edit forms

   ```php
   Route::apiResource('users', UserController::class);
   ```

### Route Parameters

Route parameters in Laravel allow dynamic segments in URLs:

1. **Basic Parameters**:
   - Dynamic parts of the URL
   - Defined with curly braces `{param}`
   - Passed to controller methods in order

   ```php
   Route::get('/users/{id}', function ($id) {
       return 'User '.$id;
   });
   
   // With controller
   Route::get('/users/{id}', [UserController::class, 'show']);
   
   public function show($id)
   {
       return User::findOrFail($id);
   }
   ```

2. **Multiple Parameters**:
   - Routes can have multiple parameters
   - Passed to controller/closure in order

   ```php
   Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
       return "Post $postId, Comment $commentId";
   });
   ```

3. **Optional Parameters**:
   - Defined with `?` suffix
   - Must have default value in function

   ```php
   Route::get('/users/{id?}', function ($id = null) {
       if ($id) {
           return 'User '.$id;
       }
       return 'All users';
   });
   ```

4. **Parameter Constraints**:
   - Restrict parameter format with regex
   - Use `where` method for constraints
   - Global constraints in RouteServiceProvider

   ```php
   // Single constraint
   Route::get('/users/{id}', [UserController::class, 'show'])
       ->where('id', '[0-9]+');
   
   // Multiple constraints
   Route::get('/users/{name}/posts/{id}', [UserController::class, 'userPost'])
       ->where([
           'name' => '[A-Za-z]+',
           'id' => '[0-9]+'
       ]);
   
   // Global constraint in RouteServiceProvider
   public function boot()
   {
       Route::pattern('id', '[0-9]+');
       
       // ...
   }
   ```

5. **Accessing Parameters in Controllers**:
   - Automatically injected into controller methods
   - Can access via dependency injection or Request object

   ```php
   // Via method parameter
   public function show($id)
   {
       return User::findOrFail($id);
   }
   
   // Via Request object
   public function show(Request $request, $id)
   {
       $id = $request->route('id');
       return User::findOrFail($id);
   }
   ```

6. **Parameter Defaults**:
   - Provide default values for optional parameters
   - Set in method signature

   ```php
   Route::get('/categories/{category?}', [CategoryController::class, 'show']);
   
   public function show($category = 'all')
   {
       return "Showing category: $category";
   }
   ```

### Route Model Binding

Route model binding in Laravel automatically resolves Eloquent models from route parameters:

1. **Implicit Binding**:
   - Automatically inject model instances
   - Route parameter name must match model variable name
   - Parameter type-hinted with model class

   ```php
   // Route definition
   Route::get('/users/{user}', [UserController::class, 'show']);
   
   // Controller method with implicit binding
   public function show(User $user)
   {
       // $user is already the User model instance
       return view('users.show', ['user' => $user]);
   }
   ```

2. **Customizing the Key**:
   - By default, binds to model's primary key (usually `id`)
   - Override with `getRouteKeyName()` method in model

   ```php
   // In User model
   public function getRouteKeyName()
   {
       return 'username'; // Bind by username instead of id
   }
   
   // Now this route will find user by username
   Route::get('/users/{user}', [UserController::class, 'show']);
   ```

3. **Explicit Binding**:
   - Define bindings in RouteServiceProvider
   - Full control over model resolution
   - Handle custom lookup logic

   ```php
   // In RouteServiceProvider boot method
   public function boot()
   {
       // Bind route parameter 'user' to User model by 'username'
       Route::bind('user', function ($value) {
           return User::where('username', $value)->firstOrFail();
       });
       
       parent::boot();
   }
   ```

4. **Customizing Missing Model Behavior**:
   - Default: 404 Not Found response
   - Customize with `missing` method

   ```php
   Route::get('/users/{user}', [UserController::class, 'show'])
       ->missing(function (Request $request) {
           return redirect()->route('users.index');
       });
   ```

5. **Soft Deleted Models**:
   - By default, soft deleted models are excluded
   - Use `withTrashed()` in binding to include them

   ```php
   // In RouteServiceProvider boot method
   Route::bind('user', function ($value) {
       return User::withTrashed()->findOrFail($value);
   });
   ```

6. **Scoped Bindings**:
   - Automatically scope child bindings to parent
   - Ensures the child belongs to the parent

   ```php
   // Child must belong to parent with scoped binding
   Route::get('/posts/{post}/comments/{comment}', [CommentController::class, 'show'])
       ->scopeBindings();
       
   // In controller
   public function show(Post $post, Comment $comment)
   {
       // $comment is guaranteed to belong to $post
   }
   ```

7. **Performance Considerations**:
   - Each model binding results in a database query
   - Consider eager loading relationships for nested resources

   ```php
   // In RouteServiceProvider
   Route::bind('post', function ($value) {
       return Post::with('comments', 'author')->findOrFail($value);
   });
   ```

### Middleware Pipeline

Middleware provides a convenient mechanism for filtering HTTP requests entering your application:

1. **Basic Concept**:
   - Acts as layers around request handling
   - Runs before and after controller actions
   - Can modify request/response or terminate early
   - Forms a "pipeline" that requests pass through

   ```php
   // Request flow through middleware
   Client -> Middleware1 -> Middleware2 -> Controller -> Middleware2 -> Middleware1 -> Client
   ```

2. **Middleware Registration**:
   - Global middleware in `app/Http/Kernel.php`
   - Route middleware registered with key in Kernel
   - Middleware groups for common combinations

   ```php
   // In App\Http\Kernel
   protected $middleware = [
       // Global middleware - runs on every request
       \App\Http\Middleware\TrustProxies::class,
       \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
       // ...
   ];
   
   protected $middlewareGroups = [
       'web' => [
           \App\Http\Middleware\EncryptCookies::class,
           \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
           // ...
       ],
       'api' => [
           'throttle:api',
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
       ],
   ];
   
   protected $routeMiddleware = [
       'auth' => \App\Http\Middleware\Authenticate::class,
       'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
       // ...
   ];
   ```

3. **Middleware Structure**:
   - `handle` method for request processing
   - Call `$next($request)` to pass to next middleware
   - Optional `terminate` method for after response is sent

   ```php
   namespace App\Http\Middleware;
   
   use Closure;
   use Illuminate\Http\Request;
   
   class LogRequestMiddleware
   {
       public function handle(Request $request, Closure $next)
       {
           // Before controller action
           Log::info('Incoming request', ['url' => $request->url()]);
           
           $response = $next($request);
           
           // After controller action
           Log::info('Outgoing response', ['status' => $response->status()]);
           
           return $response;
       }
       
       public function terminate(Request $request, $response)
       {
           // Runs after response is sent to browser
           Log::info('Request completed', [
               'url' => $request->url(),
               'response_time' => microtime(true) - LARAVEL_START
           ]);
       }
   }
   ```

4. **Middleware Parameters**:
   - Pass parameters to middleware
   - Useful for configurable middleware

   ```php
   // Middleware definition
   public function handle(Request $request, Closure $next, $role)
   {
       if (!$request->user() || !$request->user()->hasRole($role)) {
           abort(403);
       }
       
       return $next($request);
   }
   
   // Usage in routes
   Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
       ->middleware('role:admin');
   ```

5. **Middleware Execution Order**:
   - Order in Kernel matters
   - First in array is executed first
   - Can control order with middleware groups

6. **Middleware Pipeline Flow Control**:
   - Return response directly to stop pipeline
   - Redirect, abort, or custom response
   - Authentication, authorization, validation often do this

   ```php
   public function handle(Request $request, Closure $next)
   {
       if ($request->ip() === '192.168.1.1') {
           return response('Access denied.', 403);
       }
       
       return $next($request);
   }
   ```

7. **Testing Middleware**:
   - Test middleware in isolation
   - Mock requests and closures
   - Test middleware in context with feature tests

   ```php
   public function testMiddlewareBlocksUnauthorizedUsers()
   {
       $middleware = new RoleMiddleware();
       
       $request = Request::create('/admin/dashboard', 'GET');
       $request->setUserResolver(function () {
           return new User(['role' => 'user']);
       });
       
       $response = $middleware->handle($request, function ($req) {
           return new Response('OK');
       }, 'admin');
       
       $this->assertEquals(403, $response->status());
   }
   ```

### Global vs Route Middleware

Laravel provides different ways to apply middleware to routes:

1. **Global Middleware**:
   - Applied to every HTTP request
   - Registered in `$middleware` property in Kernel
   - First line of defense for security

   ```php
   // In App\Http\Kernel
   protected $middleware = [
       \App\Http\Middleware\TrustProxies::class,
       \Illuminate\Http\Middleware\HandleCors::class,
       \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
       \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
       \App\Http\Middleware\TrimStrings::class,
       \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
   ];
   ```

2. **Route Middleware**:
   - Applied only to specific routes
   - Registered in `$routeMiddleware` property in Kernel
   - Used for functionality like authentication

   ```php
   // In App\Http\Kernel
   protected $routeMiddleware = [
       'auth' => \App\Http\Middleware\Authenticate::class,
       'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
       'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
       'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
       'can' => \Illuminate\Auth\Middleware\Authorize::class,
       'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
       'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
       'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
       'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
   ];
   ```

3. **Middleware Groups**:
   - Bundles of middleware for common scenarios
   - `web` and `api` groups predefined
   - Applied to route groups or in RouteServiceProvider

   ```php
   // In App\Http\Kernel
   protected $middlewareGroups = [
       'web' => [
           \App\Http\Middleware\EncryptCookies::class,
           \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
           \Illuminate\Session\Middleware\StartSession::class,
           \Illuminate\View\Middleware\ShareErrorsFromSession::class,
           \App\Http\Middleware\VerifyCsrfToken::class,
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
       ],
   
       'api' => [
           'throttle:api',
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
       ],
   ];
   
   // In routes
   Route::middleware(['web'])->group(function () {
       // Routes with web middleware group
   });
   ```

4. **Choosing Between Global and Route Middleware**:
   - **Global**: Cross-cutting concerns affecting all requests
   - **Route**: Functionality needed only for specific routes
   - **Groups**: Common combinations of functionality

5. **Common Global Middleware**:
   - CORS handling
   - Maintenance mode
   - Trust proxies
   - Basic request validation

6. **Common Route Middleware**:
   - Authentication
   - Authorization
   - Throttling
   - Caching

7. **Performance Considerations**:
   - Global middleware runs on every request (overhead)
   - Keep global middleware lightweight
   - Use route middleware for expensive operations

### Creating Custom Middleware

Creating custom middleware allows you to add unique behaviors to your application's request handling:

1. **Generating Middleware**:
   - Use Artisan command to create middleware class
   - Places file in app/Http/Middleware directory

   ```bash
   php artisan make:middleware CheckUserRole
   ```

2. **Middleware Implementation**:
   - Implement handle method
   - Process request before or after controller
   - Optionally modify request or response

   ```php
   namespace App\Http\Middleware;
   
   use Closure;
   use Illuminate\Http\Request;
   
   class CheckUserRole
   {
       public function handle(Request $request, Closure $next, $role)
       {
           if (!$request->user() || $request->user()->role !== $role) {
               return redirect('home')->with('error', 'Unauthorized access');
           }
           
           return $next($request);
       }
   }
   ```

3. **Registering Middleware**:
   - Add to appropriate array in Kernel.php
   - Use alias for route middleware

   ```php
   // In App\Http\Kernel
   protected $routeMiddleware = [
       // ...
       'role' => \App\Http\Middleware\CheckUserRole::class,
   ];
   ```

4. **Applying Custom Middleware**:
   - Use middleware method on routes
   - Pass parameters with colon syntax

   ```php
   // Single middleware
   Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
       ->middleware('role:admin');
   
   // Multiple middleware
   Route::get('/admin/users', [AdminController::class, 'users'])
       ->middleware(['auth', 'role:admin']);
   
   // On controller
   class AdminController extends Controller
   {
       public function __construct()
       {
           $this->middleware('role:admin');
       }
   }
   ```

5. **Before and After Middleware**:
   - Handle logic before passing to next middleware
   - Handle logic after response from next middleware

   ```php
   // Before middleware
   public function handle(Request $request, Closure $next)
   {
       // Code executed before the request is handled by the application
       
       return $next($request);
   }
   
   // After middleware
   public function handle(Request $request, Closure $next)
   {
       $response = $next($request);
       
       // Code executed after the request is handled by the application
       
       return $response;
   }
   ```

6. **Middleware with Dependencies**:
   - Use constructor dependency injection
   - Container resolves dependencies automatically

   ```php
   class LogRequestMiddleware
   {
       protected $logger;
       
       public function __construct(LoggerInterface $logger)
       {
           $this->logger = $logger;
       }
       
       public function handle(Request $request, Closure $next)
       {
           $this->logger->info('Request: ' . $request->url());
           
           return $next($request);
       }
   }
   ```

7. **Middleware Priority**:
   - Change execution order with $middlewarePriority
   - Higher in array = higher priority

   ```php
   // In App\Http\Kernel
   protected $middlewarePriority = [
       \Illuminate\Session\Middleware\StartSession::class,
       \Illuminate\View\Middleware\ShareErrorsFromSession::class,
       \App\Http\Middleware\Authenticate::class,
       \Illuminate\Routing\Middleware\ThrottleRequests::class,
       \Illuminate\Routing\Middleware\SubstituteBindings::class,
       \Illuminate\Auth\Middleware\Authorize::class,
   ];
   ```

## Controllers & Requests

### Controller Types

Laravel provides different types of controllers to organize your request handling logic:

1. **Basic Controllers**:
   - Extend `App\Http\Controllers\Controller`
   - Group related request handling logic
   - Generate with `php artisan make:controller UserController`

   ```php
   namespace App\Http\Controllers;
   
   use App\Models\User;
   use Illuminate\Http\Request;
   
   class UserController extends Controller
   {
       public function index()
       {
           $users = User::all();
           return view('users.index', ['users' => $users]);
       }
       
       public function show($id)
       {
           $user = User::findOrFail($id);
           return view('users.show', ['user' => $user]);
       }
   }
   ```

2. **Resource Controllers**:
   - Follow REST convention with standard methods
   - Generate with `php artisan make:controller UserController --resource`
   - Standard methods: index, create, store, show, edit, update, destroy

   ```php
   namespace App\Http\Controllers;
   
   use App\Models\User;
   use Illuminate\Http\Request;
   
   class UserController extends Controller
   {
       public function index()
       {
           // Display a listing of users
       }
       
       public function create()
       {
           // Show form to create a new user
       }
       
       public function store(Request $request)
       {
           // Store a newly created user
       }
       
       public function show($id)
       {
           // Display the specified user
       }
       
       public function edit($id)
       {
           // Show form to edit user
       }
       
       public function update(Request $request, $id)
       {
           // Update the specified user
       }
       
       public function destroy($id)
       {
           // Remove the specified user
       }
   }
   ```

3. **API Resource Controllers**:
   - Like resource controllers but for APIs
   - No create/edit methods (form display)
   - Generate with `php artisan make:controller Api/UserController --api`

   ```php
   namespace App\Http\Controllers\Api;
   
   use App\Http\Controllers\Controller;
   use App\Models\User;
   use Illuminate\Http\Request;
   
   class UserController extends Controller
   {
       public function index()
       {
           return User::all();
       }
       
       public function store(Request $request)
       {
           return User::create($request->validated());
       }
       
       public function show($id)
       {
           return User::findOrFail($id);
       }
       
       public function update(Request $request, $id)
       {
           $user = User::findOrFail($id);
           $user->update($request->validated());
           return $user;
       }
       
       public function destroy($id)
       {
           $user = User::findOrFail($id);
           $user->delete();
           return response()->noContent();
       }
   }
   ```

4. **Invokable Controllers**:
   - Single action controllers
   - Only handle one type of request
   - Generate with `php artisan make:controller ShowDashboard --invokable`

   ```php
   namespace App\Http\Controllers;
   
   use Illuminate\Http\Request;
   
   class ShowDashboard extends Controller
   {
       public function __invoke(Request $request)
       {
           // Single action logic
           return view('dashboard');
       }
   }
   ```

5. **Nested Resource Controllers**:
   - Handle hierarchical resources
   - Parent-child relationships

   ```php
   // Routes for nested resources
   Route::resource('posts.comments', CommentController::class);
   
   // Controller with nested resource handling
   class CommentController extends Controller
   {
       public function index($postId)
       {
           return Post::findOrFail($postId)->comments;
       }
       
       public function store(Request $request, $postId)
       {
           $post = Post::findOrFail($postId);
           return $post->comments()->create($request->validated());
       }
   }
   ```

6. **Controller Middleware**:
   - Apply middleware to controller methods
   - Use in constructor or on specific methods

   ```php
   class AdminController extends Controller
   {
       public function __construct()
       {
           $this->middleware('auth');
           $this->middleware('role:admin')->only(['store', 'update', 'destroy']);
           $this->middleware('log')->except(['index']);
       }
   }
   ```

7. **Controller Namespacing**:
   - Organize controllers in subdirectories/namespaces
   - Group related functionality

   ```php
   namespace App\Http\Controllers\Admin;
   
   use App\Http\Controllers\Controller;
   
   class DashboardController extends Controller
   {
       // Admin dashboard logic
   }
   ```

### Single Action Controllers

Single Action Controllers provide a focused approach to handling requests:

1. **Basic Concept**:
   - Controller that handles one action only
   - Uses `__invoke` method
   - Clear separation of concerns

   ```php
   namespace App\Http\Controllers;
   
   use Illuminate\Http\Request;
   
   class ProcessPayment extends Controller
   {
       public function __invoke(Request $request)
       {
           // Process payment logic
           return redirect()->route('thank-you');
       }
   }
   ```

2. **Creating Single Action Controllers**:
   - Use Artisan command with --invokable flag
   - Creates controller with `__invoke` method

   ```bash
   php artisan make:controller ProcessPayment --invokable
   ```

3. **Registering Routes**:
   - Use the controller class directly
   - No action name needed

   ```php
   // Web routes
   Route::post('/payments', ProcessPayment::class);
   
   // Named route
   Route::post('/payments', ProcessPayment::class)->name('payments.process');
   ```

4. **Dependency Injection**:
   - Can use constructor injection for dependencies
   - Method injection for request and route parameters

   ```php
   class ShowProfile extends Controller
   {
       private $userRepository;
       
       public function __construct(UserRepository $userRepository)
       {
           $this->userRepository = $userRepository;
       }
       
       public function __invoke(Request $request, $id)
       {
           $user = $this->userRepository->find($id);
           return view('user.profile', ['user' => $user]);
       }
   }
   ```

5. **When to Use Single Action Controllers**:
   - Complex actions that deserve their own controller
   - Actions that don't logically fit in CRUD controllers
   - Actions with many dependencies
   - Highly specialized functionality

6. **Benefits of Single Action Controllers**:
   - Focused responsibility
   - Easier to test
   - Better organization for complex actions
   - Clear intent in route definitions

7. **Examples of Good Use Cases**:
   - Authentication actions (login, logout, etc.)
   - Complex form processing
   - File uploads
   - Payment processing
   - Report generation

   ```php
   // Example: File upload controller
   class UploadProfilePhoto extends Controller
   {
       public function __invoke(Request $request)
       {
           $request->validate([
               'photo' => 'required|image|max:2048',
           ]);
           
           $path = $request->file('photo')->store('profile-photos');
           
           $user = $request->user();
           $user->profile_photo = $path;
           $user->save();
           
           return redirect()->back()->with('status', 'Photo uploaded!');
       }
   }
   ```

### Request Validation

Laravel provides powerful validation mechanisms for handling incoming request data:

1. **Basic Validation**:
   - Use validate method on Request object
   - Automatically redirects back with errors on failure
   - Returns validated data on success

   ```php
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8|confirmed',
       ]);
       
       // Create user with validated data
       User::create($validated);
   }
   ```

2. **Validation Rules**:
   - Extensive built-in validation rules
   - Chain rules with pipe character
   - Array fields with dot notation

   ```php
   $request->validate([
       'title' => 'required|max:255',
       'body' => 'required',
       'publish_date' => 'nullable|date',
       'category_id' => 'required|exists:categories,id',
       'tags' => 'array|min:1',
       'tags.*' => 'exists:tags,id',
       'metadata.color' => 'nullable|string',
   ]);
   ```

3. **Displaying Validation Errors**:
   - Errors available in blade templates
   - `$errors` variable always available

   ```blade
   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   
   <input name="email" value="{{ old('email') }}">
   @error('email')
       <div class="alert alert-danger">{{ $message }}</div>
   @enderror
   ```

4. **Custom Validation Messages**:
   - Customize error messages
   - Per rule or per attribute-rule

   ```php
   $validated = $request->validate(
       [
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8',
       ],
       [
           'email.required' => 'We need your email address!',
           'email.email' => 'This doesn\'t look like a valid email.',
           'email.unique' => 'This email is already registered.',
           'password.min' => 'Password must be at least :min characters.',
       ]
   );
   ```

5. **Custom Validation Rules**:
   - Rule objects for complex validation
   - Closure rules for simple cases
   - Extend Validator with custom rules

   ```php
   // Using closure
   $validator = Validator::make($request->all(), [
       'password' => [
           'required',
           function ($attribute, $value, $fail) {
               if ($value === 'password') {
                   $fail('The '.$attribute.' is too weak.');
               }
           },
       ],
   ]);
   
   // Using rule object
   php artisan make:rule StrongPassword
   
   // In the rule object
   public function passes($attribute, $value)
   {
       return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $value);
   }
   
   // Using the rule
   $request->validate([
       'password' => ['required', new StrongPassword],
   ]);
   ```

6. **Validating Arrays**:
   - Validate array inputs and nested data
   - Use wildcard (*) and dot notation

   ```php
   $request->validate([
       'users' => 'required|array|min:1',
       'users.*.id' => 'required|integer|exists:users,id',
       'users.*.email' => 'required|email',
       'users.*.roles' => 'required|array|min:1',
       'users.*.roles.*' => 'exists:roles,id',
   ]);
   ```

7. **Validating Files**:
   - Special rules for file uploads
   - Size, MIME type, dimensions, etc.

   ```php
   $request->validate([
       'avatar' => 'required|file|image|max:2048',
       'documents' => 'required|array',
       'documents.*' => 'file|mimes:pdf,doc,docx|max:10240',
   ]);
   ```

8. **Conditional Validation**:
   - Apply rules based on conditions
   - sometimes, required_if, required_unless

   ```php
   $request->validate([
       'payment_type' => 'required|in:credit,paypal',
       'card_number' => 'required_if:payment_type,credit',
       'expiration' => 'required_if:payment_type,credit',
       'paypal_email' => 'required_if:payment_type,paypal',
   ]);
   ```

### Form Requests

Form Requests are dedicated classes for handling validation logic:

1. **Creating Form Requests**:
   - Generate with Artisan command
   - Separate validation logic from controllers

   ```bash
   php artisan make:request StoreUserRequest
   ```

2. **Defining Validation Rules**:
   - Override rules() method
   - Return array of validation rules

   ```php
   namespace App\Http\Requests;
   
   use Illuminate\Foundation\Http\FormRequest;
   
   class StoreUserRequest extends FormRequest
   {
       public function rules()
       {
           return [
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:8|confirmed',
           ];
       }
   }
   ```

3. **Authorization Logic**:
   - Override authorize() method
   - Return true if request is authorized

   ```php
   public function authorize()
   {
       // Check if user can create users
       return $this->user()->can('create', User::class);
   }
   ```

4. **Custom Error Messages**:
   - Override messages() method
   - Return array of custom messages

   ```php
   public function messages()
   {
       return [
           'email.required' => 'We need your email address!',
           'email.unique' => 'This email is already registered.',
           'password.min' => 'Password must be at least :min characters.',
       ];
   }
   ```

5. **Custom Attributes**:
   - Override attributes() method
   - Rename attributes in error messages

   ```php
   public function attributes()
   {
       return [
           'email' => 'email address',
       ];
   }
   ```

6. **Using Form Requests in Controllers**:
   - Type-hint request class in controller method
   - Automatically validates before controller method

   ```php
   public function store(StoreUserRequest $request)
   {
       // Validation already happened
       // If we got here, it passed
       
       $user = User::create($request->validated());
       
       return redirect()->route('users.show', $user);
   }
   ```

7. **Customizing the Validation Process**:
   - Override withValidator method
   - Add after hooks for complex validation

   ```php
   public function withValidator($validator)
   {
       $validator->after(function ($validator) {
           if ($this->somethingElseIsInvalid()) {
               $validator->errors()->add('field', 'Something is wrong with this field!');
           }
       });
   }
   ```

8. **Accessing Validated Data**:
   - Use validated() method to get validated data
   - Prevents mass assignment vulnerabilities

   ```php
   public function store(StoreUserRequest $request)
   {
       $validated = $request->validated();
       
       $user = User::create($validated);
       
       return redirect()->route('users.show', $user);
   }
   ```

### Dependency Injection in Controllers

Laravel's service container allows automatic dependency injection in your controllers:

1. **Constructor Injection**:
   - Inject dependencies in controller constructor
   - Available to all controller methods
   - Dependencies resolved from service container

   ```php
   namespace App\Http\Controllers;
   
   use App\Repositories\UserRepository;
   
   class UserController extends Controller
   {
       protected $users;
       
       public function __construct(UserRepository $users)
       {
           $this->users = $users;
       }
       
       public function index()
       {
           $users = $this->users->all();
           return view('users.index', ['users' => $users]);
       }
   }
   ```
2. **Method Injection**:
   - Inject dependencies in controller methods
   - Only available to that specific method
   - Combined with route parameters

   ```php
   public function show(Request $request, Logger $logger, $id)
   {
       $logger->info("Showing user: $id");
       return User::findOrFail($id);
   }
   ```

3. **Available Injectables**:
   - Framework classes (Request, Response)
   - Service container bindings
   - Route parameters
   - Model instances (via Route Model Binding)

   ```php
   public function store(
       StoreUserRequest $request,  // Form request
       UserRepository $repository, // Service from container
       Logger $logger              // Another service
   ) {
       $logger->info('Creating new user');
       $user = $repository->create($request->validated());
       return redirect()->route('users.show', $user);
   }
   ```

4. **Controller Constructor Injection**:
   - Available to all controller actions
   - Good for frequently used dependencies
   - Only services, not request data

   ```php
   class UserController extends Controller
   {
       private $users;
       private $logger;
       
       public function __construct(UserRepository $users, Logger $logger)
       {
           $this->users = $users;
           $this->logger = $logger;
       }
       
       public function index()
       {
           $this->logger->info('Listing users');
           return view('users.index', ['users' => $this->users->all()]);
       }
       
       public function show($id)
       {
           $this->logger->info("Showing user: $id");
           return view('users.show', ['user' => $this->users->find($id)]);
       }
   }
   ```

5. **Benefits of Dependency Injection**:
   - Clear dependencies
   - Better testability
   - Promotes loose coupling
   - Follows SOLID principles

6. **Testing with Dependency Injection**:
   - Easily mock dependencies in tests
   - Better isolated unit tests

   ```php
   public function testShow()
   {
       // Mock dependencies
       $repository = $this->createMock(UserRepository::class);
       $repository->method('find')
           ->with(1)
           ->willReturn(new User(['id' => 1, 'name' => 'John']));
       
       $logger = $this->createMock(Logger::class);
       
       // Create controller with mocked dependencies
       $controller = new UserController($repository, $logger);
       
       // Test the controller action
       $response = $controller->show(1);
       
       // Assert the response
       $this->assertEquals('John', $response->getData()['user']->name);
   }
   ```

7. **Route Model Binding with Injected Dependencies**:
   - Combine model binding with other services
   - Ordered correctly automatically

   ```php
   // Route definition
   Route::get('/posts/{post}/comments/{comment}', 
       [CommentController::class, 'show']);
   
   // Controller method with model binding and DI
   public function show(
       Request $request, 
       Post $post,        // Implicitly bound model
       Comment $comment,  // Implicitly bound model
       Logger $logger     // Service from container
   ) {
       $logger->info("Showing comment $comment->id on post $post->id");
       return view('comments.show', compact('post', 'comment'));
   }
   ```
### API Resource Controllers

API Resource Controllers are specialized controllers for building APIs with Laravel:

1. **Creating API Controllers**:
   - Generate with Artisan command
   - Focus on data manipulation, not views

   ```bash
   php artisan make:controller API/UserController --api
   ```

2. **API Controller Methods**:
   - `index()` - List resources
   - `store()` - Create new resource
   - `show()` - Display specific resource
   - `update()` - Update specific resource
   - `destroy()` - Delete specific resource

   ```php
   namespace App\Http\Controllers\API;
   
   use App\Http\Controllers\Controller;
   use App\Models\User;
   use Illuminate\Http\Request;
   
   class UserController extends Controller
   {
       public function index()
       {
           return User::all();
       }
       
       public function store(Request $request)
       {
           $validated = $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:8',
           ]);
           
           return User::create($validated);
       }
       
       public function show(User $user)
       {
           return $user;
       }
       
       public function update(Request $request, User $user)
       {
           $validated = $request->validate([
               'name' => 'sometimes|string|max:255',
               'email' => 'sometimes|email|unique:users,email,'.$user->id,
           ]);
           
           $user->update($validated);
           
           return $user;
       }
       
       public function destroy(User $user)
       {
           $user->delete();
           
           return response()->noContent();
       }
   }
   ```

3. **API Resource Routes**:
   - Register routes with `apiResource`
   - Only includes data manipulation routes

   ```php
   // In routes/api.php
   Route::apiResource('users', UserController::class);
   
   // For nested resources
   Route::apiResource('users.posts', UserPostController::class);
   ```

4. **API Resource Collections**:
   - Register multiple API resources at once
   - Keep route definitions organized

   ```php
   Route::apiResources([
       'users' => UserController::class,
       'posts' => PostController::class,
       'comments' => CommentController::class,
   ]);
   ```

5. **API Route Parameter Constraints**:
   - Scope nested resource routes
   - Ensure relationship integrity

   ```php
   Route::apiResource('users.posts', UserPostController::class)
       ->scoped(['post' => 'slug']);
   ```

6. **API Resource Response Transformation**:
   - Use API Resources for response formatting
   - Consistent data structure
   - Control included attributes
   - Transform relationships

   ```php
   namespace App\Http\Resources;
   
   use Illuminate\Http\Resources\Json\JsonResource;
   
   class UserResource extends JsonResource
   {
       public function toArray($request)
       {
           return [
               'id' => $this->id,
               'name' => $this->name,
               'email' => $this->email,
               'created_at' => $this->created_at,
               'posts' => PostResource::collection($this->whenLoaded('posts')),
           ];
       }
   }
   
   // In controller
   public function index()
   {
       return UserResource::collection(User::with('posts')->paginate());
   }
   
   public function show(User $user)
   {
       return new UserResource($user->load('posts'));
   }
   ```

7. **Best Practices for API Controllers**:
   - Use Form Requests for validation
   - Return proper HTTP status codes
   - Include pagination for collections
   - Consistent error handling
   - API versioning when needed

   ```php
   // Improved controller with best practices
   
   public function store(StoreUserRequest $request)
   {
       $user = User::create($request->validated());
       
       return new UserResource($user)
           ->response()
           ->setStatusCode(201);
   }
   
   public function update(UpdateUserRequest $request, User $user)
   {
       $user->update($request->validated());
       
       return new UserResource($user);
   }
   
   public function destroy(User $user)
   {
       $user->delete();
       
       return response()->noContent(204);
   }
   ```

## Eloquent ORM

### Eloquent vs Query Builder

Laravel provides two primary ways to interact with databases - Eloquent ORM and the Query Builder:

1. **Eloquent ORM**:
   - Object-Relational Mapper
   - Works with models representing database tables
   - Provides relationships, events, serialization
   - Active Record pattern implementation

   ```php
   // Retrieving data with Eloquent
   $users = User::where('active', true)
       ->orderBy('name')
       ->take(10)
       ->get();
   
   // Creating with Eloquent
   $user = new User;
   $user->name = 'John Doe';
   $user->email = 'john@example.com';
   $user->save();
   
   // Or mass assignment
   $user = User::create([
       'name' => 'John Doe',
       'email' => 'john@example.com'
   ]);
   ```

2. **Query Builder**:
   - Fluent interface for SQL queries
   - More direct database access
   - No model overhead
   - Used by Eloquent internally

   ```php
   // Retrieving data with Query Builder
   $users = DB::table('users')
       ->where('active', true)
       ->orderBy('name')
       ->take(10)
       ->get();
   
   // Inserting with Query Builder
   DB::table('users')->insert([
       'name' => 'John Doe',
       'email' => 'john@example.com'
   ]);
   ```

3. **Key Differences**:

   | Feature | Eloquent | Query Builder |
      |---------|----------|---------------|
   | Object Mapping | Yes (Models) | No (Raw Data) |
   | Relationships | Yes | Limited |
   | Events | Yes | No |
   | Model Methods | Yes | No |
   | Performance | Slightly higher overhead | Lower overhead |
   | Mass Assignment | Yes | No |
   | Accessors/Mutators | Yes | No |
   | Scopes | Yes | No |

4. **When to Use Eloquent**:
   - Working with complex domain models
   - Need for relationships
   - Using model events
   - Need for accessors/mutators
   - Business logic in models

5. **When to Use Query Builder**:
   - Raw database operations
   - Complex queries with fewer needs for relationships
   - Performance-critical operations
   - Bulk operations
   - Working directly with tables (no models)

6. **Hybrid Approach**:
   - Use both where appropriate
   - Query Builder from Eloquent models

   ```php
   // Get Query Builder from Eloquent model
   $query = User::query();
   
   // Apply Query Builder methods
   $query->whereRaw('DATE(created_at) = ?', [date('Y-m-d')])
       ->selectRaw('COUNT(*) as count, status')
       ->groupBy('status');
   
   // Get results
   $results = $query->get();
   ```

7. **Performance Considerations**:
   - Eloquent has slight overhead for model instantiation
   - Query Builder is more efficient for large data sets
   - Both support chunk processing for large datasets

   ```php
   // Processing large datasets with Eloquent
   User::chunk(100, function ($users) {
       foreach ($users as $user) {
           // Process user
       }
   });
   
   // Processing large datasets with Query Builder
   DB::table('users')->orderBy('id')->chunk(100, function ($users) {
       foreach ($users as $user) {
           // Process user
       }
   });
   ```

### Model Relationships

Eloquent provides powerful relationship capabilities between database tables:

1. **One-to-One**:
   - Each record has exactly one related record
   - Defined with `hasOne` and `belongsTo` methods

   ```php
   // User has one profile
   class User extends Model
   {
       public function profile()
       {
           return $this->hasOne(Profile::class);
       }
   }
   
   // Profile belongs to user
   class Profile extends Model
   {
       public function user()
       {
           return $this->belongsTo(User::class);
       }
   }
   
   // Usage
   $profile = User::find(1)->profile;
   $user = Profile::find(1)->user;
   ```

2. **One-to-Many**:
   - Each record has multiple related records
   - Defined with `hasMany` and `belongsTo` methods

   ```php
   // User has many posts
   class User extends Model
   {
       public function posts()
       {
           return $this->hasMany(Post::class);
       }
   }
   
   // Post belongs to user
   class Post extends Model
   {
       public function user()
       {
           return $this->belongsTo(User::class);
       }
   }
   
   // Usage
   $posts = User::find(1)->posts;
   $user = Post::find(1)->user;
   ```

3. **Many-to-Many**:
   - Each record relates to multiple records and vice versa
   - Uses pivot table
   - Defined with `belongsToMany` method

   ```php
   // User belongs to many roles
   class User extends Model
   {
       public function roles()
       {
           return $this->belongsToMany(Role::class);
       }
   }
   
   // Role belongs to many users
   class Role extends Model
   {
       public function users()
       {
           return $this->belongsToMany(User::class);
       }
   }
   
   // Usage
   $roles = User::find(1)->roles;
   $users = Role::find(1)->users;
   
   // With pivot data
   $role = User::find(1)->roles()->first();
   $pivotData = $role->pivot->created_at;
   ```

4. **Has-Many-Through**:
   - Access distant relations through an intermediate relation
   - Defined with `hasManyThrough` method

   ```php
   // Country has many posts through users
   class Country extends Model
   {
       public function posts()
       {
           return $this->hasManyThrough(
               Post::class, 
               User::class
           );
       }
   }
   
   // Usage
   $posts = Country::find(1)->posts;
   ```

5. **Polymorphic Relationships**:
   - Model belongs to more than one type of model
   - Defined with `morphTo`, `morphMany`, `morphOne` methods

   ```php
   // Comment can belong to post or video
   class Comment extends Model
   {
       public function commentable()
       {
           return $this->morphTo();
       }
   }
   
   class Post extends Model
   {
       public function comments()
       {
           return $this->morphMany(Comment::class, 'commentable');
       }
   }
   
   class Video extends Model
   {
       public function comments()
       {
           return $this->morphMany(Comment::class, 'commentable');
       }
   }
   
   // Usage
   $comments = Post::find(1)->comments;
   $commentable = Comment::find(1)->commentable; // Returns Post or Video
   ```

6. **Many-to-Many Polymorphic Relationships**:
   - Many-to-many relation with polymorphic models
   - Defined with `morphToMany` and `morphedByMany` methods

   ```php
   // Tag can belong to posts or videos
   class Tag extends Model
   {
       public function posts()
       {
           return $this->morphedByMany(Post::class, 'taggable');
       }
       
       public function videos()
       {
           return $this->morphedByMany(Video::class, 'taggable');
       }
   }
   
   class Post extends Model
   {
       public function tags()
       {
           return $this->morphToMany(Tag::class, 'taggable');
       }
   }
   
   // Usage
   $tags = Post::find(1)->tags;
   $posts = Tag::find(1)->posts;
   ```

7. **Custom Relationship Keys**:
   - Change default foreign and local keys
   - Customize table and column names

   ```php
   // Custom keys for relationship
   public function profile()
   {
       return $this->hasOne(Profile::class, 'user_id', 'id');
   }
   
   // Custom pivot table
   public function roles()
   {
       return $this->belongsToMany(Role::class, 'role_user');
   }
   
   // Custom pivot columns
   public function roles()
   {
       return $this->belongsToMany(Role::class)
           ->withPivot('active', 'created_by')
           ->withTimestamps();
   }
   ```

### Eager Loading

Eager loading addresses the N+1 query problem by loading relationships efficiently:

1. **The N+1 Problem**:
   - One query for main records
   - One additional query per related record
   - Results in many unnecessary database queries

   ```php
   // N+1 Problem Example
   $users = User::all(); // 1 query
   
   foreach ($users as $user) {
       $user->profile; // +1 query per user
   }
   ```

2. **Basic Eager Loading**:
   - Load relationships in advance with `with`
   - Reduces multiple queries to just a few

   ```php
   // Eager Loading Example
   $users = User::with('profile')->get(); // 2 queries total
   
   foreach ($users as $user) {
       $user->profile; // No additional queries
   }
   ```

3. **Multiple Relationships**:
   - Load multiple relationships at once
   - Nested arrays for deeper relations

   ```php
   // Multiple relationships
   $users = User::with(['profile', 'posts'])->get();
   
   // Nested relationships
   $users = User::with('posts.comments')->get();
   
   // Multiple nested relationships
   $users = User::with([
       'profile', 
       'posts.comments', 
       'posts.tags'
   ])->get();
   ```

4. **Constraining Eager Loads**:
   - Filter related models during eager loading
   - Use closures for complex constraints

   ```php
   // Only active posts
   $users = User::with(['posts' => function ($query) {
       $query->where('active', true);
   }])->get();
   
   // Only recent posts with their related comments
   $users = User::with([
       'posts' => function ($query) {
           $query->where('created_at', '>=', now()->subDays(7));
       },
       'posts.comments'
   ])->get();
   ```

5. **Lazy Eager Loading**:
   - Add eager loading to an existing model collection
   - Useful when conditions determine what to load

   ```php
   $users = User::all();
   
   if ($someCondition) {
       $users->load('posts');
   }
   
   if ($anotherCondition) {
       $users->load('profile');
   }
   ```

6. **Nested Lazy Eager Loading**:
   - Same capabilities as regular eager loading

   ```php
   $users = User::all();
   
   $users->load([
       'posts' => function ($query) {
           $query->where('active', true);
       },
       'posts.comments'
   ]);
   ```

7. **Conditional Relationships**:
   - Load relationships only if needed
   - Optimize database queries

   ```php
   // Only load posts relation if $includePosts is true
   $users = User::when($includePosts, function ($query) {
       return $query->with('posts');
   })->get();
   ```

8. **Counting Related Models**:
   - Count related models without loading them
   - Use `withCount`, `withSum`, `withAvg`, etc.

   ```php
   // Count related models
   $users = User::withCount('posts')->get();
   foreach ($users as $user) {
       echo $user->posts_count;
   }
   
   // Multiple counts
   $posts = Post::withCount([
       'comments', 
       'likes'
   ])->get();
   
   // Count with constraints
   $users = User::withCount([
       'posts',
       'posts as active_posts_count' => function ($query) {
           $query->where('active', true);
       }
   ])->get();
   ```

### Query Scopes

Query scopes allow you to reuse common query constraints throughout your application:

1. **Global Scopes**:
   - Applied to all queries on the model
   - Defined in model class or separate class
   - Always applied unless explicitly removed

   ```php
   // Define global scope in model
   protected static function booted()
   {
       static::addGlobalScope('active', function (Builder $builder) {
           $builder->where('active', true);
       });
   }
   
   // Define global scope in separate class
   class ActiveScope implements Scope
   {
       public function apply(Builder $builder, Model $model)
       {
           $builder->where('active', true);
       }
   }
   
   // Register scope in model
   protected static function booted()
   {
       static::addGlobalScope(new ActiveScope);
   }
   
   // Usage - scope applied automatically
   $users = User::all(); // Only active users
   
   // Remove global scope
   $users = User::withoutGlobalScope('active')->get();
   $users = User::withoutGlobalScope(ActiveScope::class)->get();
   $users = User::withoutGlobalScopes()->get(); // Remove all global scopes
   ```

2. **Local Scopes**:
   - Methods prefixed with 'scope'
   - Applied only when explicitly called
   - Chainable with other query methods

   ```php
   // Define local scope
   public function scopeActive($query)
   {
       return $query->where('active', true);
   }
   
   public function scopeOfType($query, $type)
   {
       return $query->where('type', $type);
   }
   
   // Usage
   $users = User::active()->get();
   $users = User::ofType('admin')->active()->get();
   ```

3. **Dynamic Scopes**:
   - Accept parameters for flexible constraints
   - Reusable across different criteria

   ```php
   public function scopeOfStatus($query, $status)
   {
       return $query->where('status', $status);
   }
   
   public function scopeCreatedBetween($query, $startDate, $endDate)
   {
       return $query->whereBetween('created_at', [$startDate, $endDate]);
   }
   
   // Usage
   $users = User::ofStatus('active')->get();
   $users = User::createdBetween('2022-01-01', '2022-12-31')->get();
   ```

4. **Combining Scopes**:
   - Chain multiple scopes together
   - Mix scopes with standard query methods

   ```php
   // Multiple scopes
   $users = User::active()
       ->ofType('admin')
       ->orderBy('name')
       ->paginate(15);
   
   // Scopes with where clauses
   $users = User::active()
       ->where('department_id', $departmentId)
       ->get();
   ```

5. **Scope for Relationship Queries**:
   - Apply scopes to relationship queries
   - Filter related models with constraints

   ```php
   // Define scope on Post model
   class Post extends Model
   {
       public function scopePublished($query)
       {
           return $query->where('published', true);
       }
   }
   
   // Use scope when accessing relationship
   $user = User::find(1);
   $publishedPosts = $user->posts()->published()->get();
   ```

6. **Advanced Scopes with Joins**:
   - Complex queries using joins
   - Organize business logic in scopes

   ```php
   public function scopeWithActiveComments($query)
   {
       return $query->join('comments', 'posts.id', '=', 'comments.post_id')
           ->where('comments.active', true)
           ->select('posts.*')
           ->distinct();
   }
   ```

7. **Best Practices**:
   - Use global scopes sparingly
   - Group related constraints in scopes
   - Name scopes clearly and consistently
   - Document scope functionality when complex

### Accessors and Mutators

Accessors and mutators provide a way to transform model attributes when retrieving or setting them:

1. **Accessors**:
   - Transform attributes when retrieving from model
   - Define with `get{Attribute}Attribute` naming convention or `Attribute` class
   - Format data consistently across the application

   ```php
   // Using get method (Laravel 8 and earlier)
   public function getFullNameAttribute()
   {
       return "{$this->first_name} {$this->last_name}";
   }
   
   // Using Attribute class (Laravel 9+)
   use Illuminate\Database\Eloquent\Casts\Attribute;
   
   protected function fullName(): Attribute
   {
       return Attribute::make(
           get: fn () => "{$this->first_name} {$this->last_name}"
       );
   }
   
   // Usage
   $user = User::find(1);
   echo $user->full_name; // John Doe
   ```

2. **Mutators**:
   - Transform attributes when setting on model
   - Define with `set{Attribute}Attribute` naming convention or `Attribute` class
   - Validate or format data before saving

   ```php
   // Using set method (Laravel 8 and earlier)
   public function setPasswordAttribute($value)
   {
       $this->attributes['password'] = Hash::make($value);
   }
   
   // Using Attribute class (Laravel 9+)
   protected function password(): Attribute
   {
       return Attribute::make(
           set: fn ($value) => Hash::make($value)
       );
   }
   
   // Usage
   $user = User::find(1);
   $user->password = 'plain-text-password'; // Stored as hashed
   $user->save();
   ```

3. **Combined Accessors and Mutators**:
   - Define both getter and setter in one place
   - Keep related transformations together

   ```php
   // Using separate methods (Laravel 8 and earlier)
   public function getFirstNameAttribute($value)
   {
       return ucfirst($value);
   }
   
   public function setFirstNameAttribute($value)
   {
       $this->attributes['first_name'] = strtolower($value);
   }
   
   // Using Attribute class (Laravel 9+)
   protected function firstName(): Attribute
   {
       return Attribute::make(
           get: fn ($value) => ucfirst($value),
           set: fn ($value) => strtolower($value)
       );
   }
   ```

4. **Accessor and Mutator with Dependencies**:
   - Use class properties in accessors and mutators
   - Access other attributes and methods

   ```php
   protected function formattedPrice(): Attribute
   {
       return Attribute::make(
           get: function () {
               return '5. **Accessing Parameters in Controllers**:
   - Automatically injected into controller methods
   - Can access via dependency injection or Request object

   ```php
   // Via method parameter
   public function show($id)
   {
       return User::findOrFail($id);
   }
   
   // Via Request object
   public function show(Request $request, $id)
   {
       $id = $request->route('id');
       return User::findOrFail($id);
   }
   ```

6. **Parameter Defaults**:
   - Provide default values for optional parameters
   - Set in method signature

   ```php
   Route::get('/categories/{category?}', [CategoryController::class, 'show']);
   
   public function show($category = 'all')
   {
       return "Showing category: $category";
   }
   ```


### Events and Observers

Eloquent models fire events during various lifecycle points, allowing you to hook into operations:

1. **Available Model Events**:
   - `retrieved`: After model is retrieved from database
   - `creating`/`created`: Before/after model is created
   - `updating`/`updated`: Before/after model is updated
   - `saving`/`saved`: Before/after model is saved (created or updated)
   - `deleting`/`deleted`: Before/after model is deleted
   - `restoring`/`restored`: Before/after soft-deleted model is restored
   - `replicating`: Before model is replicated

2. **Defining Event Listeners in Model**:
   - Use boot method to register event listeners
   - Use closures or listener classes

   ```php
   protected static function booted()
   {
       // Using closures
       static::created(function ($user) {
           // Send welcome email
       });
       
       static::updated(function ($user) {
           // Log changes
       });
       
       // Using methods
       static::creating([UserObserver::class, 'creating']);
   }
   ```

3. **Model Observers**:
   - Dedicated classes for event handling
   - Cleaner organization for multiple event handlers
   - Register in service provider

   ```php
   // Create observer
   php artisan make:observer UserObserver --model=User
   
   // Observer class
   class UserObserver
   {
       public function created(User $user)
       {
           // Send welcome email
       }
       
       public function updated(User $user)
       {
           // Log changes
       }
       
       public function deleting(User $user)
       {
           // Cleanup related data
       }
   }
   
   // Register in AppServiceProvider
   public function boot()
   {
       User::observe(UserObserver::class);
   }
   ```

4. **Practical Use Cases**:
   - **Creating**: Initialize related models, set default values
   - **Created**: Send notifications, generate resources
   - **Updating/Updated**: Track changes, update search indexes
   - **Deleting**: Clean up related resources, validate if deletion allowed
   - **Deleted**: Update caches, notify systems

   ```php
   // Example: Setting defaults on creating
   protected static function booted()
   {
       static::creating(function ($user) {
           $user->api_token = Str::random(60);
           $user->preferences = json_encode(['theme' => 'light']);
       });
   }
   ```

5. **Tracking Model Changes**:
   - Monitor attribute changes
   - Log modifications for auditing

   ```php
   5. **Accessing Parameters in Controllers**:
   - Automatically injected into controller methods
   - Can access via dependency injection or Request object

   ```php
   // Via method parameter
   public function show($id)
   {
       return User::findOrFail($id);
   }
   
   // Via Request object
   public function show(Request $request, $id)
   {
       $id = $request->route('id');
       return User::findOrFail($id);
   }
   ```

6. **Parameter Defaults**:
   - Provide default values for optional parameters
   - Set in method signature

   ```php
   Route::get('/categories/{category?}', [CategoryController::class, 'show']);
   
   public function show($category = 'all')
   {
       return "Showing category: $category";
   }
   ```
### Polymorphic Relationships

Polymorphic relationships allow a model to belong to multiple types of models:

1. **Basic Polymorphic Relationship**:
   - One model belonging to multiple model types
   - Requires morphable type and ID columns

   ```php
   // Comment model (belongs to Post or Video)
   class Comment extends Model
   {
       public function commentable()
       {
           return $this->morphTo();
       }
   }
   
   // Post model
   class Post extends Model
   {
       public function comments()
       {
           return $this->morphMany(Comment::class, 'commentable');
       }
   }
   
   // Video model
   class Video extends Model
   {
       public function comments()
       {
           return $this->morphMany(Comment::class, 'commentable');
       }
   }
   ```

2. **Database Structure**:
   - Morphable columns store type and ID
   - Naming convention: `{relation}_type` and `{relation}_id`

   ```php
   Schema::create('comments', function (Blueprint $table) {
       $table->id();
       $table->text('content');
       $table->string('commentable_type'); // Post, Video, etc.
       $table->unsignedBigInteger('commentable_id');
       $table->timestamps();
   });
   ```

3. **Using Polymorphic Relationships**:
   - Access relation from any side
   - Type automatically handled by Laravel

   ```php
   // Get the post's comments
   $post = Post::find(1);
   $comments = $post->comments;
   
   // Get the comment's owner (Post or Video)
   $comment = Comment::find(1);
   $commentable = $comment->commentable; // Returns Post or Video instance
   
   // Create comment for post
   $post->comments()->create([
       'content' => 'Great post!'
   ]);
   ```

4. **Polymorphic One-to-One**:
   - One model having one morph relation
   - Defined with `morphOne` method

   ```php
   // Post or User can have one image
   class Image extends Model
   {
       public function imageable()
       {
           return $this->morphTo();
       }
   }
   
   class Post extends Model
   {
       public function image()
       {
           return $this->morphOne(Image::class, 'imageable');
       }
   }
   
   class User extends Model
   {
       public function image()
       {
           return $this->morphOne(Image::class, 'imageable');
       }
   }
   ```

5. **Many-to-Many Polymorphic Relationships**:
   - Models sharing a many-to-many relationship
   - Requires pivot table with morphs columns

   ```php
   // Tag can belong to many posts or videos
   class Tag extends Model
   {
       public function posts()
       {
           return $this->morphedByMany(Post::class, 'taggable');
       }
       
       public function videos()
       {
           return $this->morphedByMany(Video::class, 'taggable');
       }
   }
   
   class Post extends Model
   {
       public function tags()
       {
           return $this->morphToMany(Tag::class, 'taggable');
       }
   }
   
   class Video extends Model
   {
       public function tags()
       {
           return $this->morphToMany(Tag::class, 'taggable');
       }
   }
   ```

6. **Polymorphic Pivot Table**:
   - Structure for many-to-many polymorphic

   ```php
   Schema::create('taggables', function (Blueprint $table) {
       $table->id();
       $table->unsignedBigInteger('tag_id');
       $table->string('taggable_type');
       $table->unsignedBigInteger('taggable_id');
       $table->timestamps();
   });
   ```

7. **Custom Polymorphic Types**:
   - Change model name used for type
   - Useful when moving or renaming models

   ```php
   // In AppServiceProvider boot method
   Relation::morphMap([
       'post' => 'App\Models\Post',
       'video' => 'App\Models\Video',
   ]);
   ```
## Database & Migrations

### Migration Strategies

Database migrations are version control for your database schema:

1. **Creating Migrations**:
   - Generate with Artisan command
   - Follow naming conventions

   ```bash
   # Create table migration
   php artisan make:migration create_users_table
   
   # Create table with model
   php artisan make:model Post --migration
   
   # Modify existing table
   php artisan make:migration add_votes_to_posts_table
   ```

2. **Migration Structure**:
   - `up` method for applying changes
   - `down` method for reverting changes
   - Descriptive class names

   ```php
   public function up()
   {
       Schema::create('posts', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->text('content');
           $table->unsignedBigInteger('user_id');
           $table->boolean('published')->default(false);
           $table->timestamps();
           
           $table->foreign('user_id')->references('id')->on('users');
       });
   }
   
   public function down()
   {
       Schema::dropIfExists('posts');
   }
   ```

3. **Running Migrations**:
   - Apply migrations with Artisan commands
   - Roll back when needed

   ```bash
   # Run all pending migrations
   php artisan migrate
   
   # Roll back last batch
   php artisan migrate:rollback
   
   # Roll back specific number of migrations
   php artisan migrate:rollback --step=2
   
   # Roll back all migrations, then run them again
   php artisan migrate:refresh
   
   # Drop all tables, then run migrations
   php artisan migrate:fresh
   ```

4. **Migration Status**:
   - Check migration history
   - View pending migrations

   ```bash
   php artisan migrate:status
   ```

5. **Migration Strategies for Production**:
   - Never modify existing migrations
   - Create new migrations for changes
   - Use transactions for safety
   - Test rollbacks locally first

   ```php
   // Adding transaction to migration
   public function up()
   {
       Schema::connection('tenant')->transaction(function () {
           Schema::connection('tenant')->create('posts', function (Blueprint $table) {
               // Table definition
           });
       });
   }
   ```

6. **Complex Schema Changes**:
   - Breaking changes into multiple migrations
   - Handling data transformations

   ```php
   // First migration: Add new column
   public function up()
   {
       Schema::table('users', function (Blueprint $table) {
           $table->string('full_name')->nullable()->after('name');
       });
   }
   
   // Second migration: Fill data
   public function up()
   {
       DB::table('users')->chunk(100, function ($users) {
           foreach ($users as $user) {
               DB::table('users')
                   ->where('id', $user->id)
                   ->update(['full_name' => $user->first_name . ' ' . $user->last_name]);
           }
       });
   }
   
   // Third migration: Make column required
   public function up()
   {
       Schema::table('users', function (Blueprint $table) {
           $table->string('full_name')->nullable(false)->change();
       });
   }
   ```

7. **Managing Multiple Environments**:
   - Environment-specific migrations
   - Conditional schema changes

   ```php
   public function up()
   {
       Schema::create('logs', function (Blueprint $table) {
           $table->id();
           $table->text('message');
           $table->timestamps();
           
           // Add extra columns for production
           if (app()->environment('production')) {
               $table->string('ip_address')->nullable();
               $table->string('user_agent')->nullable();
           }
       });
   }
   ```

### Schema Builder

Laravel's Schema Builder provides a fluent interface for creating and modifying database tables:

1. **Creating Tables**:
   - `Schema::create` method
   - Blueprint for defining columns
   - Standard column types

   ```php
   Schema::create('users', function (Blueprint $table) {
       $table->id(); // Auto-incrementing primary key
       $table->string('name');
       $table->string('email')->unique();
       $table->timestamp('email_verified_at')->nullable();
       $table->string('password');
       $table->rememberToken();
       $table->timestamps(); // created_at and updated_at
   });
   ```

2. **Column Types**:
   - Extensive range of column types
   - Type modifiers for constraints

   ```php
   // Basic column types
   $table->string('name', 100);
   $table->text('description');
   $table->integer('votes');
   $table->float('amount', 8, 2);
   $table->decimal('amount', 8, 2);
   $table->boolean('confirmed');
   $table->date('created_on');
   $table->dateTime('created_at');
   $table->time('sunrise');
   $table->json('options');
   
   // Column modifiers
   $table->string('email')->unique();
   $table->integer('votes')->default(0);
   $table->text('description')->nullable();
   $table->timestamp('created_at')->useCurrent();
   $table->enum('difficulty', ['easy', 'medium', 'hard']);
   ```

3. **Modifying Tables**:
   - Adding columns
   - Modifying existing columns
   - Dropping columns

   ```php
   // Adding columns to existing table
   Schema::table('users', function (Blueprint $table) {
       $table->string('phone')->after('email')->nullable();
   });
   
   // Modifying columns (requires doctrine/dbal package)
   Schema::table('users', function (Blueprint $table) {
       $table->string('name', 50)->change(); // Change length to 50
       $table->string('email')->unique()->change(); // Add unique constraint
       $table->renameColumn('email', 'email_address');
   });
   
   // Dropping columns
   Schema::table('users', function (Blueprint $table) {
       $table->dropColumn('votes');
       $table->dropColumn(['votes', 'avatar', 'location']); // Multiple columns
   });
   ```

4. **Indexes and Constraints**:
   - Adding various index types
   - Foreign key constraints

   ```php
   // Adding indexes
   $table->index('email');
   $table->unique('email');
   $table->primary('id');
   $table->spatialIndex('coordinates');
   $table->fullText('description');
   
   // Composite indexes
   $table->index(['account_id', 'created_at']);
   
   // Foreign keys
   $table->unsignedBigInteger('user_id');
   $table->foreign('user_id')
         ->references('id')
         ->on('users')
         ->onDelete('cascade');
   
   // Shorthand foreign key
   $table->foreignId('user_id')
         ->constrained()
         ->onDelete('cascade');
   ```

5. **Dropping Tables and Indexes**:
   - Remove tables completely
   - Drop specific indexes

   ```php
   // Drop a table
   Schema::dropIfExists('users');
   
   // Drop indexes
   $table->dropIndex('email_index');
   $table->dropUnique('email_unique');
   $table->dropPrimary('users_id_primary');
   $table->dropForeign('posts_user_id_foreign');
   ```

6. **Conditional Schema Operations**:
   - Check if tables or columns exist
   - Perform operations conditionally

   ```php
   // Check if table exists
   if (Schema::hasTable('users')) {
       // Table exists
   }
   
   // Check if column exists
   if (Schema::hasColumn('users', 'email')) {
       // Column exists
   }
   
   // Create table if not exists
   if (!Schema::hasTable('settings')) {
       Schema::create('settings', function (Blueprint $table) {
           // Table definition
       });
   }
   ```

7. **Advanced Schema Operations**:
   - Temporary tables
   - Table comments
   - Engine configuration

   ```php
   // Create temporary table
   Schema::create('reports', function (Blueprint $table) {
       $table->temporary();
       $table->id();
       $table->string('name');
       $table->timestamps();
   });
   
   // Add table comment
   Schema::create('users', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->comment('Stores user account information');
   });
   
   // Set storage engine
   Schema::create('users', function (Blueprint $table) {
       $table->engine = 'InnoDB';
       $table->id();
       // Other columns
   });
   ```

### Seeders and Factories

Seeders and factories help populate your database with test or initial data:

1. **Database Seeders**:
   - Classes for inserting data
   - Can be run individually or together
   - Useful for reference/static data

   ```php
   // Create a seeder
   php artisan make:seeder UserSeeder
   
   // UserSeeder class
   class UserSeeder extends Seeder
   {
       public function run()
       {
           DB::table('users')->insert([
               'name' => 'Admin User',
               'email' => 'admin@example.com',
               'password' => Hash::make('password'),
               'role' => 'admin',
               'created_at' => now(),
               'updated_at' => now(),
           ]);
       }
   }
   
   // Run seeders
   php artisan db:seed
   php artisan db:seed --class=UserSeeder
   ```

2. **Model Factories**:
   - Generate fake data for models
   - Useful for testing and development
   - Define common attribute patterns

   ```php
   // Create a factory
   php artisan make:factory PostFactory --model=Post
   
   // PostFactory class
   class PostFactory extends Factory
   {
       protected $model = Post::class;
       
       public function definition()
       {
           return [
               'title' => $this->faker->sentence(),
               'content' => $this->faker->paragraphs(3, true),
               'user_id' => User::factory(),
               'published' => $this->faker->boolean(80),
               'published_at' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
           ];
       }
   }
   ```

3. **Using Factories**:
   - Create model instances with fake data
   - Override attributes when needed
   - Create relationships

   ```php
   // Create a single model
   $user = User::factory()->create();
   
   // Create model with specific attributes
   $user = User::factory()->create([
       'role' => 'admin',
       'email' => 'admin@example.com',
   ]);
   
   // Create multiple models
   $users = User::factory()->count(10)->create();
   
   // Create model but don't persist
   $user = User::factory()->make();
   
   // Create model with relationships
   $user = User::factory()
       ->has(Post::factory()->count(3))
       ->create();
   ```

4. **Factory States**:
   - Define variations of the model
   - Combine multiple states
   - Reusable attribute combinations

   ```php
   // Define states in factory
   public function definition()
   {
       return [
           'title' => $this->faker->sentence(),
           'published' => false,
       ];
   }
   
   public function published()
   {
       return $this->state(function (array $attributes) {
           return [
               'published' => true,
               'published_at' => now(),
           ];
       });
   }
   
   public function withImage()
   {
       return $this->state(function (array $attributes) {
           return [
               'has_image' => true,
               'image_path' => 'images/post-' . rand(1, 10) . '.jpg',
           ];
       });
   }
   
   // Using states
   $post = Post::factory()->published()->create();
   $post = Post::factory()->published()->withImage()->create();
   ```

5. **Relationships in Factories**:
   - Create related models automatically
   - Different relationship types

   ```php
   // One-to-many relationships
   $user = User::factory()
       ->has(Post::factory()->count(3))
       ->create();
   
   // Belongs-to relationships
   $post = Post::factory()
       ->for(User::factory()->state([
           'name' => 'John Doe',
       ]))
       ->create();
   
   // Many-to-many relationships
   $post = Post::factory()
       ->hasAttached(
           Tag::factory()->count(3),
           ['created_at' => now()]
       )
       ->create();
   ```

6. **Using Seeders with Factories**:
   - Combine for comprehensive seeding
   - Organize related seed data

   ```php
   class DatabaseSeeder extends Seeder
   {
       public function run()
       {
           // Call specific seeders
           $this->call([
               RoleSeeder::class,
               UserSeeder::class,
               PostSeeder::class,
           ]);
       }
   }
   
   class PostSeeder extends Seeder
   {
       public function run()
       {
           // Create posts with factories
           User::all()->each(function ($user) {
               Post::factory()
                   ->count(rand(1, 5))
                   ->for($user)
                   ->create();
           });
       }
   }
   ```

7. **Seeding Production Data**:
   - Seed essential data in production
   - Skip test data in production

   ```php
   class DatabaseSeeder extends Seeder
   {
       public function run()
       {
           // Always seed essential data
           $this->call(RolesAndPermissionsSeeder::class);
           $this->call(CountriesSeeder::class);
           
           // Only seed test data in non-production
           if (!app()->environment('production')) {
               $this->call(TestDataSeeder::class);
           }
       }
   }
   ```

### Query Optimization

Optimizing database queries is crucial for application performance:

1. **Eager Loading Relationships**:
   - Solve N+1 query problem
   - Load relationships in advance

   ```php
   // N+1 Problem
   $posts = Post::all(); // 1 query
   foreach ($posts as $post) {
       $post->user->name; // +N queries (one per post)
   }
   
   // Solution: Eager loading
   $posts = Post::with('user')->get(); // 2 queries total
   foreach ($posts as $post) {
       $post->user->name; // No additional queries
   }
   
   // Multiple relationships
   $posts = Post::with(['user', 'comments', 'tags'])->get();
   
   // Nested relationships
   $posts = Post::with('comments.user')->get();
   ```

2. **Lazy Eager Loading**:
   - Add eager loading to existing models
   - Load relationships conditionally

   ```php
   $posts = Post::all();
   
   if ($includeComments) {
       $posts->load('comments');
   }
   
   if ($includeTags) {
       $posts->load('tags');
   }
   ```

3. **Query Constraints and Indexing**:
   - Add database indexes for frequently queried columns
   - Use correct column types
   - Optimize WHERE clauses

   ```php
   // Add index in migration
   $table->index('email');
   $table->index(['status', 'created_at']);
   
   // Use indexed columns in queries
   $users = User::where('email', 'john@example.com')->get();
   $recentPosts = Post::where('status', 'published')
       ->orderBy('created_at', 'desc')
       ->get();
   ```

4. **Select Specific Columns**:
   - Only retrieve needed columns
   - Reduce data transfer and processing

   ```php
   // Select specific columns
   $users = User::select('id', 'name', 'email')->get();
   
   // Dynamic columns selection
   $fields = ['id', 'name', 'email'];
   $users = User::select($fields)->get();
   ```

5. **Chunk Processing for Large Datasets**:
   - Process large result sets in chunks
   - Prevent memory exhaustion

   ```php
   // Using chunk
   User::chunk(100, function ($users) {
       foreach ($users as $user) {
           // Process user
       }
   });
   
   // Using lazy collections (PHP generator)
   foreach (User::cursor() as $user) {
       // Process each user without loading all into memory
   }
   ```

6. **Query Caching**:
   - Cache frequently run queries
   - Invalidate cache when data changes

   ```php
   // Cache query results
   $users = Cache::remember('all.users', 3600, function () {
       return User::all();
   });
   
   // Conditional caching
   $users = Cache::remember('users.admin', 3600, function () {
       return User::where('role', 'admin')->get();
   });
   ```

7. **Database Indexing Strategies**:
   - Single column indexes for equality searches
   - Composite indexes for multiple column conditions
   - Index order matters for sorting efficiency

   ```php
   // In migration
   // Best for WHERE status = ?
   $table->index('status');
   
   // Best for WHERE status = ? AND created_at > ?
   // Also good for ORDER BY created_at
   $table->index(['status', 'created_at']);
   ```

### Database Transactions

Database transactions ensure operations are atomic, maintaining data integrity:

1. **Basic Transactions**:
   - Wrap operations in a transaction
   - Automatic rollback on exceptions

   ```php
   DB::transaction(function () {
       DB::table('users')->update(['votes' => 1]);
       DB::table('posts')->delete();
   });
   ```

2. **Manual Transaction Control**:
   - Explicitly begin, commit, and rollback
   - More control over the process

   ```php
   try {
       DB::beginTransaction();
       
       // Database operations
       $user->update(['balance' => $user->balance - 100]);
       $recipient->update(['balance' => $recipient->balance + 100]);
       
       DB::commit();
       // Transaction successful
   } catch (\Exception $e) {
       DB::rollBack();
       // Transaction failed
       throw $e;
   }
   ```

3. **Transaction Isolation Levels**:
   - Control concurrency behavior
   - Set appropriate level for operation requirements

   ```php
   DB::transaction(function () {
       // Operations
   }, 5, \PDO::TRANSACTION_SERIALIZABLE);
   
   // Available levels:
   // - PDO::TRANSACTION_READ_UNCOMMITTED
   // - PDO::TRANSACTION_READ_COMMITTED
   // - PDO::TRANSACTION_REPEATABLE_READ
   // - PDO::TRANSACTION_SERIALIZABLE
   ```

4. **Nested Transactions**:
   - Support for transaction nesting
   - Top-level transaction controls commit/rollback

   ```php
   DB::transaction(function () {
       // Outer transaction operations
       
       DB::transaction(function () {
           // Inner transaction operations
       });
       
       // More outer transaction operations
   });
   ```

5. **Transaction within Eloquent**:
   - Transactions with Eloquent model operations
   - Rollback if model operations fail

   ```php
   DB::transaction(function () {
       $user = User::create([
           'name' => 'John',
           'email' => 'john@example.com',
       ]);
       
       $user->profile()->create([
           'bio' => 'Developer',
           'location' => 'New York',
       ]);
   });
   ```

6. **Practical Transaction Use Cases**:
   - Financial operations
   - Multi-step processes where all must succeed
   - Protecting against race conditions

   ```php
   // Fund transfer example
   public function transferFunds(User $from, User $to, $amount)
   {
       return DB::transaction(function () use ($from, $to, $amount) {
           // Verify sufficient funds (with lock to prevent race conditions)
           $fromAccount = Account::where('user_id', $from->id)
               ->lockForUpdate()
               ->firstOrFail();
               
           if ($fromAccount->balance < $amount) {
               throw new InsufficientFundsException();
           }
           
           // Update balances
           $fromAccount->decrement('balance', $amount);
           
           $toAccount = Account::where('user_id', $to->id)
               ->lockForUpdate()
               ->firstOrFail();
               
           $toAccount->increment('balance', $amount);
           
           // Create transaction record
           Transaction::create([
               'from_account_id' => $fromAccount->id,
               'to_account_id' => $toAccount->id,
               'amount' => $amount,
               'status' => 'completed',
           ]);
           
           return true;
       });
   }
   ```

7. **Transaction Deadlocks**:
   - Recognize deadlock situations
   - Implement retry logic

   ```php
   $maxAttempts = 3;
   $attempts = 0;
   
   while ($attempts < $maxAttempts) {
       try {
           DB::transaction(function () {
               // Operations that might cause deadlocks
           });
           
           // Transaction successful, exit loop
           break;
       } catch (\PDOException $e) {
           // Check if deadlock error
           if (str_contains($e->getMessage(), 'Deadlock found')) {
               $attempts++;
               
               if ($attempts >= $maxAttempts) {
                   throw $e;
               }
               
               // Wait before retrying
               usleep(mt_rand(100000, 500000)); // 0.1-0.5 seconds
           } else {
               // Not a deadlock, rethrow
               throw $e;
           }
       }
   }
   ```

### Multiple Database Connections

Laravel allows working with multiple database connections simultaneously:

1. **Configuring Multiple Connections**:
   - Define in config/database.php
   - Environment-specific settings

   ```php
   // In config/database.php
   'connections' => [
       'mysql' => [
           'driver' => 'mysql',
           'host' => env('DB_HOST', '127.0.0.1'),
           // Other settings
       ],
       
       'reporting' => [
           'driver' => 'mysql',
           'host' => env('DB_REPORTING_HOST', '127.0.0.1'),
           'database' => env('DB_REPORTING_DATABASE', 'reporting'),
           // Other settings
       ],
   ],
   ```

2. **Using Different Connections**:
   - Specify in queries and migrations
   - Switch between connections

   ```php
   // Query Builder
   $users = DB::connection('mysql')->table('users')->get();
   $reports = DB::connection('reporting')->table('reports')->get();
   
   // Eloquent
   $user = User::on('mysql')->find(1);
   $report = Report::on('reporting')->find(1);
   ```

3. **Default Connection for Models**:
   - Set default connection for specific models
   - Override at runtime

   ```php
   class User extends Model
   {
       protected $connection = 'mysql';
   }
   
   class Report extends Model
   {
       protected $2. **Method Injection**:
   - Inject dependencies in controller methods
   - Only available to that specific method
   - Combined with route parameters

   ```php
   public function show(Request $request, Logger $logger, $id)
   {
       $logger->info("Showing user: $id");
       return User::findOrFail($id);
   }
   ```
4. **Transaction Across Multiple Connections**:
   - Separate transactions for each connection
   - No automatic cross-database transactions

   ```php
   DB::connection('mysql')->transaction(function () {
       // MySQL operations
   });
   
   DB::connection('reporting')->transaction(function () {
       // Reporting database operations
   });
   ```

5. **Read/Write Connections**:
   - Separate connections for reads and writes
   - Load balancing and replication

   ```php
   // In config/database.php
   'mysql' => [
       'read' => [
           'host' => [
               '192.168.1.1',
               '192.168.1.2',
           ],
       ],
       'write' => [
           'host' => [
               '192.168.1.3',
           ],
       ],
       'driver' => 'mysql',
       'database' => 'database',
       'username' => 'root',
       'password' => '',
       'charset' => 'utf8mb4',
       'collation' => 'utf8mb4_unicode_ci',
       'prefix' => '',
   ],
   ```

6. **Multiple Connection Migrations**:
   - Run migrations on specific connection
   - Create connection-specific migrations

   ```php
   // Run migrations on specific connection
   php artisan migrate --database=reporting
   
   // In migration file
   Schema::connection('reporting')->create('reports', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->timestamps();
   });
   ```

7. **Dynamic Connection Switching**:
   - Switch connections based on conditions
   - Multi-tenant applications

   ```php
   // Tenant middleware example
   public function handle(Request $request, Closure $next)
   {
       $tenant = $request->route('tenant');
       
       // Configure the tenant database
       config([
           'database.connections.tenant.database' => 'tenant_' . $tenant
       ]);
       
       // Purge the connection if it exists
       DB::purge('tenant');
       
       // Reconnect with new configuration
       DB::reconnect('tenant');
       
       // Set tenant connection as default for models
       DB::setDefaultConnection('tenant');
       
       return $next($request);
   }
   ```


## Authentication & Authorization

### Authentication Scaffolding

Laravel provides authentication scaffolding to quickly set up login and registration systems:

1. **Laravel Breeze**:
   - Minimal authentication implementation
   - Simple Blade templates and controllers
   - Available with Livewire or Inertia.js options

   ```bash
   # Install Laravel Breeze
   composer require laravel/breeze --dev
   
   # Install Blade scaffolding
   php artisan breeze:install
   
   # Install Livewire scaffolding
   php artisan breeze:install livewire
   
   # Install Inertia scaffolding (Vue or React)
   php artisan breeze:install vue
   php artisan breeze:install react
   
   # Install API authentication
   php artisan breeze:install api
   ```

2. **Laravel UI**:
   - Bootstrap-based authentication
   - Legacy scaffolding solution

   ```bash
   # Install Laravel UI
   composer require laravel/ui
   
   # Generate authentication scaffolding
   php artisan ui bootstrap --auth
   php artisan ui vue --auth
   php artisan ui react --auth
   ```

3. **Manual Authentication**:
   - Using built-in authentication classes
   - Customized authentication logic

   ```php
   // Attempt to authenticate
   if (Auth::attempt(['email' => $email, 'password' => $password])) {
       // Authentication successful
       return redirect()->intended('dashboard');
   }
   
   // Manual login
   Auth::login($user);
   
   // Check if user is authenticated
   if (Auth::check()) {
       // User is logged in
   }
   
   // Get the current user
   $user = Auth::user();
   
   // Logout
   Auth::logout();
   ```

4. **Multiple Authentication Guards**:
   - Different authentication systems for different contexts
   - Admin, user, API authentication separation

   ```php
   // Configure guards in config/auth.php
   'guards' => [
       'web' => [
           'driver' => 'session',
           'provider' => 'users',
       ],
       
       'admin' => [
           'driver' => 'session',
           'provider' => 'admins',
       ],
       
       'api' => [
           'driver' => 'token',
           'provider' => 'users',
           'hash' => false,
       ],
   ],
   
   // Use specific guard
   Auth::guard('admin')->attempt($credentials);
   
   // Check authentication with specific guard
   if (Auth::guard('admin')->check()) {
       // Admin is logged in
   }
   ```

5. **Authentication Events**:
   - React to authentication events
   - Customize behavior

   ```php
   // In EventServiceProvider
   protected $listen = [
       \Illuminate\Auth\Events\Registered::class => [
           \App\Listeners\SendWelcomeNotification::class,
       ],
       
       \Illuminate\Auth\Events\Login::class => [
           \App\Listeners\LogSuccessfulLogin::class,
       ],
       
       \Illuminate\Auth\Events\Failed::class => [
           \App\Listeners\LogFailedLoginAttempt::class,
       ],
       
       \Illuminate\Auth\Events\Logout::class => [
           \App\Listeners\LogSuccessfulLogout::class,
       ],
   ];
   ```

6. **Password Reset Functionality**:
   - Built-in password reset
   - Customizable emails and views

   ```php
   // Send password reset link
   $status = Password::sendResetLink(
       $request->only('email')
   );
   
   // Reset password
   $status = Password::reset(
       $request->only('email', 'password', 'password_confirmation', 'token'),
       function ($user, $password) {
           $user->forceFill([
               'password' => Hash::make($password)
           ])->save();
       }
   );
   ```

7. **Email Verification**:
   - Verify user email addresses
   - Middleware for protected routes

   ```php
   // Add to User model
   use Illuminate\Contracts\Auth\MustVerifyEmail;
   
   class User extends Authenticatable implements MustVerifyEmail
   {
       // ...
   }
   
   // Protect routes
   Route::middleware(['auth', 'verified'])->group(function () {
       Route::get('/dashboard', [DashboardController::class, 'index']);
   });
   ```

### Laravel Sanctum

Laravel Sanctum provides a featherweight authentication system for SPAs, mobile apps, and APIs:

1. **Installation and Configuration**:
   - Set up Sanctum
   - Configure domains

   ```bash
   # Install Sanctum
   composer require laravel/sanctum
   
   # Publish configuration and migrations
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   
   # Run migrations
   php artisan migrate
   ```

2. **API Token Authentication**:
   - Create and manage API tokens
   - Specify token abilities (permissions)

   ```php
   // Create token
   $token = $user->createToken('api-token');
   
   // Create token with abilities
   $token = $user->createToken('admin-token', ['users:read', 'users:write']);
   
   // Check token abilities
   if ($user->tokenCan('users:write')) {
       // Token has permission
   }
   
   // Revoke tokens
   $user->tokens()->delete(); // All tokens
   $user->tokens()->where('id', $tokenId)->delete(); // Specific token
   ```

3. **SPA Authentication**:
   - Cookie-based authentication for SPAs
   - CSRF protection

   ```php
   // config/sanctum.php
   'stateful' => [
       'localhost',
       'localhost:3000',
       'example.com',
       '*.example.com',
   ],
   
   // Routes
   Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
       return $request->user();
   });
   
   // Login endpoint
   Route::post('/login', function (Request $request) {
       if (Auth::attempt($request->only('email', 'password'))) {
           $request->session()->regenerate();
           return response()->json(['success' => true]);
       }
       
       return response()->json(['success' => false], 401);
   });
   ```

4. **Mobile App Authentication**:
   - Token-based authentication for mobile apps
   - Long-lived access

   ```php
   // Login and issue token
   Route::post('/api/login', function (Request $request) {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
           'device_name' => 'required',
       ]);
       
       $user = User::where('email', $request->email)->first();
       
       if (!$user || !Hash::check($request->password, $user->password)) {
           return response()->json(['message' => 'Invalid credentials'], 401);
       }
       
       $token = $user->createToken($request->device_name)->plainTextToken;
       
       return response()->json(['token' => $token]);
   });
   
   // Protected route
   Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
       return $request->user();
   });
   ```

5. **Token Expiration**:
   - Configure token lifetimes
   - Token pruning

   ```php
   // In configuration (config/sanctum.php)
   'expiration' => 60 * 24, // 24 hours in minutes
   
   // Prune expired tokens
   php artisan sanctum:prune-expired --hours=24
   ```

6. **Multiple API Guards**:
   - Different authentication for different APIs
   - Mix with other guard types

   ```php
   // config/auth.php
   'guards' => [
       'web' => [
           'driver' => 'session',
           'provider' => 'users',
       ],
       
       'api' => [
           'driver' => 'sanctum',
           'provider' => 'users',
       ],
       
       'admin-api' => [
           'driver' => 'sanctum',
           'provider' => 'admins',
       ],
   ],
   
   // Route protection
   Route::middleware('auth:api')->group(function () {
       // Regular API routes
   });
   
   Route::middleware('auth:admin-api')->group(function () {
       // Admin API routes
   });
   ```

7. **Testing with Sanctum**:
   - Authenticate in tests
   - Simulate token abilities

   ```php
   public function test_user_can_access_protected_endpoint()
   {
       $user = User::factory()->create();
       
       $this->actingAs($user, 'sanctum');
       
       $response = $this->getJson('/api/user');
       
       $response->assertOk();
   }
   
   public function test_user_with_ability()
   {
       $user = User::factory()->create();
       $user->createToken('test-token', ['users:read'])->plainTextToken;
       
       $this->actingAs($user, 'sanctum');
       
       // Test ability
       $this->assertTrue($user->tokenCan('users:read'));
   }
   ```

### Laravel Passport

Laravel Passport provides full OAuth2 server implementation for API authentication:

1. **Installation and Setup**:
   - Install and configure
   - Generate encryption keys

   ```bash
   # Install Passport
   composer require laravel/passport
   
   # Run migrations
   php artisan migrate
   
   # Install Passport
   php artisan passport:install
   ```

2. **Configuration**:
   - Configure model and authentication guard
   - Enable in service provider

   ```php
   // User model
   use Laravel\Passport\HasApiTokens;
   
   class User extends Authenticatable
   {
       use HasApiTokens, Notifiable;
   }
   
   // AuthServiceProvider
   public function boot()
   {
       $this->registerPolicies();
       
       Passport::routes();
       
       // Set token lifetimes
       Passport::tokensExpireIn(now()->addDays(15));
       Passport::refreshTokensExpireIn(now()->addDays(30));
       Passport::personalAccessTokensExpireIn(now()->addMonths(6));
   }
   
   // config/auth.php
   'guards' => [
       'web' => [
           'driver' => 'session',
           'provider' => 'users',
       ],
       
       'api' => [
           'driver' => 'passport',
           'provider' => 'users',
       ],
   ],
   ```

3. **OAuth Grant Types**:
   - Password grant
   - Authorization code grant
   - Client credentials grant
   - Personal access tokens

   ```php
   // Authorization routes
   Route::get('/redirect', function (Request $request) {
       $request->session()->put('state', $state = Str::random(40));
       
       $query = http_build_query([
           'client_id' => 'client-id',
           'redirect_uri' => 'http://example.com/callback',
           'response_type' => 'code',
           'scope' => 'place-orders check-status',
           'state' => $state,
       ]);
       
       return redirect('http://passport-app.test/oauth/authorize?'.$query);
   });
   
   // Callback route
   Route::get('/callback', function (Request $request) {
       $state = $request->session()->pull('state');
       
       throw_unless(
           strlen($state) > 0 && $state === $request->state,
           InvalidArgumentException::class
       );
       
       $response = Http::asForm()->post('http://passport-app.test/oauth/token', [
           'grant_type' => 'authorization_code',
           'client_id' => 'client-id',
           'client_secret' => 'client-secret',
           'redirect_uri' => 'http://example.com/callback',
           'code' => $request->code,
       ]);
       
       return $response->json();
   });
   ```

4. **Token Scopes**:
   - Define available scopes
   - Check token scopes

   ```php
   // Define scopes
   Passport::tokensCan([
       'place-orders' => 'Place orders',
       'check-status' => 'Check order status',
   ]);
   
   // Default scopes
   Passport::setDefaultScope([
       'check-status',
   ]);
   
   // Check scopes
   Route::get('/orders', function (Request $request) {
       if ($request->user()->tokenCan('place-orders')) {
           // Order creation logic
       }
   })->middleware('auth:api');
   
   // Require scopes
   Route::get('/orders', function (Request $request) {
       // Order creation logic
   })->middleware(['auth:api', 'scope:place-orders']);
   ```

5. **Client Management**:
   - Create OAuth clients
   - First-party vs third-party clients

   ```php
   // Create password grant client
   php artisan passport:client --password
   
   // Create client for first-party application
   php artisan passport:client --personal
   
   // Create client credentials grant
   php artisan passport:client --client
   ```

6. **Token Management**:
   - Create personal access tokens
   - Revoke tokens

   ```php
   // Create personal access token
   $token = $user->createToken('Token Name')->accessToken;
   
   // Get user's tokens
   $tokens = $user->tokens;
   
   // Revoke tokens
   $user->tokens()->where('id', $tokenId)->revoke();
   
   // Revoke all tokens
   $user->tokens->each(function ($token, $key) {
       $token->revoke();
   });
   ```

7. **Configuration for SPA and Mobile**:
   - Configure for different clients
   - Security considerations

   ```php
   // Configure public clients (SPA, mobile)
   Passport::enableImplicitGrant();
   
   // Example SPA authentication flow
   // 1. User logs in via normal login endpoint
   // 2. SPA makes request to GET /oauth/authorize with client_id and response_type=token
   // 3. If already authenticated, receives access token immediately
   ```

### Laravel Fortify

Laravel Fortify is a frontend-agnostic authentication backend implementation:

1. **Installation and Setup**:
   - API-first authentication backend
   - Works with any frontend

   ```bash
   # Install Fortify
   composer require laravel/fortify
   
   # Publish configuration and migrations
   php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
   
   # Run migrations
   php artisan migrate
   ```

2. **Enabling Features**:
   - Configure desired authentication features
   - Register service provider

   ```php
   // config/fortify.php
   'features' => [
       Features::registration(),
       Features::resetPasswords(),
       Features::emailVerification(),
       Features::updateProfileInformation(),
       Features::updatePasswords(),
       Features::twoFactorAuthentication([
           'confirmPassword' => true,
       ]),
   ],
   
   // app/Providers/FortifyServiceProvider.php
   public function boot()
   {
       Fortify::createUsersUsing(CreateNewUser::class);
       Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
       Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
       Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
   }
   ```

3. **Authentication Routes**:
   - Automatic route registration
   - Custom path configuration

   ```php
   // Default routes provided:
   // - /login
   // - /logout
   // - /register
   // - /user/profile-information
   // - /user/password
   // - /forgot-password
   // - /reset-password
   // - /email/verification-notification
   // - /user/two-factor-authentication
   // - /user/confirmed-two-factor-authentication
   // - /user/two-factor-qr-code
   // - /user/two-factor-recovery-codes
   
   // config/fortify.php
   'prefix' => 'auth',
   'domain' => null,
   'middleware' => ['web'],
   ```

4. **Customizing Views**:
   - Register view responses
   - Integrate with frontend frameworks

   ```php
   // FortifyServiceProvider
   public function boot()
   {
       Fortify::loginView(function () {
           return view('auth.login');
       });
       
       Fortify::registerView(function () {
           return view('auth.register');
       });
       
       Fortify::requestPasswordResetLinkView(function () {
           return view('auth.forgot-password');
       });
       
       Fortify::resetPasswordView(function ($request) {
           return view('auth.reset-password', ['request' => $request]);
       });
   }
   ```

5. **Custom Authentication Logic**:
   - Override default authentication
   - Add additional verification

   ```php
   // FortifyServiceProvider
   public function boot()
   {
       Fortify::authenticateUsing(function (Request $request) {
           $user = User::where('email', $request->email)->first();
           
           if ($user && Hash::check($request->password, $user->password)) {
               // Check if user is active
               if (!$user->is_active) {
                   return false;
               }
               
               return $user;
           }
       });
   }
   ```

6. **Two-Factor Authentication**:
   - Enable and configure
   - Recovery codes

   ```php
   // Enable in config
   Features::twoFactorAuthentication([
       'confirmPassword' => true,
   ]),
   
   // Check if user has 2FA enabled
   if ($user->two_factor_secret) {
       // 2FA is enabled
   }
   
   // Get QR code SVG
   $user->twoFactorQrCodeSvg();
   
   // Get recovery codes
   $user->recoveryCodes();
   ```

7. **Authentication Responses**:
   - Customize responses for each action
   - Different responses for web vs API

   ```php
   // FortifyServiceProvider
   public function boot()
   {
       Fortify::registerResponse(function (Request $request, $user) {
           return $request->wantsJson()
               ? response()->json(['user' => $user])
               : redirect()->intended(Fortify::redirects('register'));
       });
       
       Fortify::loginResponse(function (Request $request, $user) {
           return $request->wantsJson()
               ? response()->json(['user' => $user])
               : redirect()->intended(Fortify::redirects('login'));
       });
   }
   ```

### Gates and Policies

Laravel gates and policies provide a way to authorize user actions:

1. **Defining Gates**:
   - Simple authorization callbacks
   - Register in service provider

   ```php
   // AuthServiceProvider
   public function boot()
   {
       $this->registerPolicies();
       
       // Define a gate with closure
       Gate::define('update-post', function (User $user, Post $post) {
           return $user->id === $post->user_id;
       });
       
       // Define gate with class/method
       Gate::define('admin-action', [AdminPolicy::class, 'check']);
   }
   ```

2. **Using Gates**:
   - Check authorization in controllers
   - Check in views and routes

   ```php
   // Controller
   public function update(Request $request, Post $post)
   {
       if (Gate::denies('update-post', $post)) {
           abort(403);
       }
       
       // Update post
   }
   
   // Alternative syntax
   Gate::authorize('update-post', $post);
   
   // With helpers
   $this->authorize('update-post', $post);
   
   // In Blade templates
   @can('update-post', $post)
       <!-- Show edit button -->
   @endcan
   
   // Check for any ability
   if (Gate::any(['update-post', 'delete-post'], $post)) {
       // User can either update or delete
   }
   ```

3. **Policies**:
   - Class-based authorization
   - Map to specific model actions

   ```php
   // Generate policy
   php artisan make:policy PostPolicy --model=Post
   
   // PostPolicy.php
   class PostPolicy
   {
       public function viewAny(User $user)
       {
           return true;
       }
       
       public function view(User $user, Post $post)
       {
           return true;
       }
       
       public function create(User $user)
       {
           return $user->hasPermission('create_posts');
       }
       
       public function update(User $user, Post $post)
       {
           return $user->id === $post->user_id ||
                  $user->hasRole('editor');
       }
       
       public function delete(User $user, Post $post)
       {
           return $user->id === $post->user_id ||
                  $user->hasRole('admin');
       }
   }
   ```

4. **Registering Policies**:
   - Associate policies with models
   - Automatic resolution by convention

   ```php
   // AuthServiceProvider
   protected $policies = [
       Post::class => PostPolicy::class,
       Comment::class => CommentPolicy::class,
   ];
   ```

5. **Using Policies**:
   - Similar syntax to gates
   - Automatic model binding

   ```php
   // Controller
   public function update(Request $request, Post $post)
   {
       $this->authorize('update', $post);
       
       // Update post
   }
   
   // With Gate facade
   if (Gate::allows('update', $post)) {
       // User can update post
   }
   
   // In Blade templates
   @can('update', $post)
       <!-- Show edit button -->
   @endcan
   ```

6. **Policy Responses**:
   - Customize authorization responses
   - Add messages for denials

   ```php
   // In policy method
   public function update(User $user, Post $post)
   {
       return $user->id === $post->user_id
           ? Response::allow()
           : Response::deny('You do not own this post.');
   }
   
   // Handler.php
   protected function unauthenticated($request, AuthenticationException $exception)
   {
       return $request->expectsJson()
           ? response()->json(['message' => 'Unauthenticated.'], 401)
           : redirect()->guest(route('login'));
   }
   ```

7. **Policy Filters**:
   - Override policy checks
   - Super user access

   ```php
   // AuthServiceProvider
   public function boot()
   {
       $this->registerPolicies();
       
       // Before all other policy checks
       Gate::before(function ($user, $ability) {
           if ($user->hasRole('super-admin')) {
               return true;
           }
       });
       
       // After all other policy checks (if result is still null)
       Gate::after(function ($user, $ability, $result, $arguments) {
           if ($user->hasPermission('override-policies')) {
               return true;
           }
       });
   }
   ```

### Role-Based Access Control

Implementing RBAC in Laravel:

1. **Basic Role Implementation**:
   - Create roles and permissions tables
   - Define relationships with user model
   - Check role-based permissions

   ```php
   // User model with roles relation
   class User extends Authenticatable
   {
       public function roles()
       {
           return $this->belongsToMany(Role::class);
       }
       
       public function hasRole($role)
       {
           return $this->roles->contains('name', $role);
       }
       
       public function hasPermission($permission)
       {
           foreach ($this->roles as $role) {
               if ($role->permissions->contains('name', $permission)) {
                   return true;
               }
           }
           return false;
       }
   }
   ```

2. **Using Packages**:
   - Spatie Laravel Permission
   - Laravel-permission-ui
   - Laravel Bouncer

   ```php
   // Using Spatie Laravel Permission
   use Spatie\Permission\Traits\HasRoles;
   
   class User extends Authenticatable
   {
       use HasRoles;
       
       // ...
   }
   
   // Usage
   $user->assignRole('writer');
   $user->hasRole('writer');
   $user->hasPermissionTo('edit articles');
   ```

3. **Custom Middleware**:
   - Check roles in route middleware
   - Protect routes based on roles
   - Combine with gates and policies

   ```php
   // Role middleware
   class CheckRole
   {
       public function handle($request, Closure $next, $role)
       {
           if (!$request->user() || !$request->user()->hasRole($role)) {
               abort(403, 'Unauthorized action.');
           }
           
           return $next($request);
       }
   }
   
   // Register in Kernel.php
   protected $routeMiddleware = [
       'role' => \App\Http\Middleware\CheckRole::class,
   ];
   
   // Usage in routes
   Route::middleware('role:admin')->group(function () {
       Route::get('/admin/dashboard', [AdminController::class, 'index']);
   });
   ```

4. **Caching Role Checks**:
   - Cache role assignments
   - Improve performance for frequent checks
   - Clear cache on role changes

   ```php
   public function hasRole($role)
   {
       $cacheKey = 'user_'.$this->id.'_has_role_'.$role;
       
       return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($role) {
           return $this->roles->contains('name', $role);
       });
   }
   ```

Role-Based Access Control (RBAC) allows for organized authorization management:

1. **Basic Role Models**:
   - Define relationships between users, roles, and permissions
   - Many-to-many relationships

   ```php
   // Basic database structure
   Schema::create('roles', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->string('slug')->unique();
       $table->text('description')->nullable();
       $table->timestamps();
   });
   
   Schema::create('permissions', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->string('slug')->unique();
       $table->text('description')->nullable();
       $table->timestamps();
   });
   
   Schema::create('role_user', function (Blueprint $table) {
       $table->unsignedBigInteger('user_id');
       $table->unsignedBigInteger('role_id');
       $table->timestamps();
       
       $table->primary(['user_id', 'role_id']);
   });
   
   Schema::create('permission_role', function (Blueprint $table) {
       $table->unsignedBigInteger('permission_id');
       $table->unsignedBigInteger('role_id');
       $table->timestamps();
       
       $table->primary(['permission_id', 'role_id']);
   });
   ```

2. **Model Relationships**:
   - Set up Eloquent relationships
   - Methods for role/permission checks

   ```php
   // User model
   public function roles()
   {
       return $this->belongsToMany(Role::class);
   }
   
   public function hasRole($role)
   {
       if (is_string($role)) {
           return $this->roles->contains('slug', $role);
       }
       
       return $role->intersect($this->roles)->isNotEmpty();
   }
   
   // Role model
   public function permissions()
   {
       return $this->belongsToMany(Permission::class);
   }
   
   public function users()
   {
       return $this->belongsToMany(User::class);
   }
   
   // Permission model
   public function roles()
   {
       return $this->belongsToMany(Role::class);
   }
   ```

3. **Permission Checks**:
   - Check user permissions directly or via roles
   - Caching for performance

   ```php
   // User model
   public function hasPermissionTo($permission)
   {
       return $this->hasPermissionThroughRole($permission) || $this->hasDirectPermission($permission);
   }
   
   public function hasPermissionThroughRole($permission)
   {
       foreach ($this->roles as $role) {
           if ($role->permissions->contains('slug', $permission)) {
               return true;
           }
       }
       
       return false;
   }
   
   public function hasDirectPermission($permission)
   {
       if (is_string($permission)) {
           return $this->permissions->contains('slug', $permission);
       }
       
       return $permission->intersect($this->permissions)->isNotEmpty();
   }
   ```

4. **Integration with Gates**:
   - Use RBAC with Laravel's authorization
   - Register permission-based gates

   ```php
   // AuthServiceProvider
   public function boot()
   {
       $this->registerPolicies();
       
       // Register permissions as gates
       $permissions = Permission::all(); // Consider caching this
       
       foreach ($permissions as $permission) {
           Gate::define($permission->slug, function ($user) use ($permission) {
               return $user->hasPermissionTo($permission->slug);
           });
       }
   }
   ```

5. **Middleware Integration**:
   - Create middleware for role/permission checks
   - Protect routes based on roles/permissions

   ```php
   // RoleMiddleware
   public function handle($request, Closure $next, $role)
   {
       if (!auth()->check()) {
           return redirect('login');
       }
       
       $roles = is_array($role) ? $role : explode('|', $role);
       
       if (!auth()->user()->hasRole($roles)) {
           abort(403);
       }
       
       return $next($request);
   }
   
   // Route definition
   Route::middleware(['role:admin'])->group(function () {
       Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
   });
   
   Route::middleware(['permission:edit-posts'])->group(function () {
       Route::put('/posts/{post}', [PostController::class, 'update']);
   });
   ```

6. **Blade Directives**:
   - Convenient directives for templates
   - Conditional UI elements

   ```php
   // AppServiceProvider
   public function boot()
   {
       Blade::directive('role', function ($role) {
           return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
       });
       
       Blade::directive('endrole', function () {
           return "<?php endif; ?>";
       });
       
       Blade::directive('permission', function ($permission) {
           return "<?php if(auth()->check() && auth()->user()->hasPermissionTo({$permission})): ?>";
       });
       
       Blade::directive('endpermission', function () {
           return "<?php endif; ?>";
       });
   }
   
   // Usage in Blade templates
   @role('admin')
       <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
   @endrole
   
   @permission('edit-posts')
       <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
   @endpermission
   ```


## Caching & Performance

### Cache Drivers

Laravel supports various cache drivers for different needs:

1. **Supported Cache Drivers**:
   - File: Simple file-based caching
   - Database: Cache in database tables
   - Memcached: Distributed memory caching
   - Redis: Advanced key-value store
   - Array: In-memory for testing (not persistent)
   - Null: No caching (for testing)

   ```php
   // Cache configuration in config/cache.php
   'stores' => [
       'file' => [
           'driver' => 'file',
           'path' => storage_path('framework/cache/data'),
       ],
       'redis' => [
           'driver' => 'redis',
           'connection' => 'cache',
       ],
       // Other drivers...
   ],
   ```

2. **Basic Cache Operations**:
   - Store values: `put()`, `add()`
   - Retrieve values: `get()`, `pull()`
   - Check existence: `has()`
   - Remove values: `forget()`, `flush()`

   ```php
   // Store value for 5 minutes
   Cache::put('key', 'value', 300);
   
   // Forever
   Cache::forever('key', 'value');
   
   // Retrieve (with default)
   $value = Cache::get('key', 'default');
   
   // Retrieve and delete
   $value = Cache::pull('key');
   
   // Check if exists
   if (Cache::has('key')) {
       // Key exists
   }
   
   // Remove
   Cache::forget('key');
   
   // Clear all cache
   Cache::flush();
   ```

3. **Advanced Caching**:
   - Remember pattern: `remember()`, `rememberForever()`
   - Atomic operations: `increment()`, `decrement()`
   - Tags for grouping: `tags()`

   ```php
   // Remember pattern (store if not exists)
   $users = Cache::remember('users', 60, function () {
       return User::all();
   });
   
   // Atomic increment/decrement
   Cache::increment('visits');
   Cache::decrement('stock', 5);
   
   // Cache tags (only Redis, Memcached)
   Cache::tags(['people', 'authors'])->put('John', $john, 600);
   Cache::tags(['people', 'readers'])->put('Jane', $jane, 600);
   
   // Flush specific tags
   Cache::tags(['people', 'authors'])->flush();
   ```

4. **Cache Serialization**:
   - Models and collections are serialized
   - Consider performance implications
   - Selective caching for complex objects

   ```php
   // Caching a query with specific columns
   $users = Cache::remember('users', 60, function () {
       return User::select(['id', 'name', 'email'])->get();
   });
   ```

5. **Cache Configuration**:
   - Default store configuration
   - TTL (time-to-live) defaults
   - Prefix to avoid conflicts

   ```php
   // In config/cache.php
   'default' => env('CACHE_DRIVER', 'file'),
   'prefix' => env('CACHE_PREFIX', 'laravel_cache'),
   ```

6. **Cache Lock**:
   - Distributed locks with Redis or Memcached
   - Prevent race conditions
   - Atomic operations

   ```php
   Cache::lock('processing-report')->get(function () {
       // This code will not be executed concurrently
       processLargeReport();
   });
   
   // Manual lock handling
   $lock = Cache::lock('processing-report', 120);
   
   if ($lock->get()) {
       try {
           // Processing that needs to be locked
           processLargeReport();
       } finally {
           $lock->release();
       }
   }
   ```

### Query Caching

Caching database queries for performance improvements:

1. **Basic Query Caching**:
   - Cache expensive queries
   - Set appropriate TTL based on data volatility
   - Clear cache when data changes

   ```php
   // Basic query caching
   $users = Cache::remember('users.all', 60, function () {
       return User::all();
   });
   
   // With query conditions
   $activeUsers = Cache::remember('users.active', 60, function () {
       return User::where('active', true)->get();
   });
   ```

2. **Query Cache Invalidation**:
   - Clear related caches on model changes
   - Use model events or observers
   - Consider using cache tags

   ```php
   // In User model
   protected static function booted()
   {
       static::saved(function ($user) {
           Cache::forget('users.all');
           Cache::forget('users.active');
           Cache::forget('user.'.$user->id);
       });
       
       static::deleted(function ($user) {
           Cache::forget('users.all');
           Cache::forget('users.active');
           Cache::forget('user.'.$user->id);
       });
   }
   ```

3. **Using Cache Tags**:
   - Group related caches with tags
   - Invalidate groups at once
   - Only available with Redis or Memcached

   ```php
   // Using tags for related queries
   $users = Cache::tags(['users'])->remember('all', 60, function () {
       return User::all();
   });
   
   $user = Cache::tags(['users'])->remember('user.'.$id, 60, function () use ($id) {
       return User::find($id);
   });
   
   // Invalidate all user caches
   Cache::tags(['users'])->flush();
   ```

4. **Query Builder with Cache**:
   - Create reusable cached queries
   - Encapsulate caching logic
   - Maintain clean controller code

   ```php
   // In a repository class
   public function getActiveUsers()
   {
       $cacheKey = 'users.active';
       
       return Cache::remember($cacheKey, 60, function () {
           return User::where('active', true)
               ->with('profile')
               ->orderBy('name')
               ->get();
       });
   }
   ```

5. **Cache Keys Strategy**:
   - Include query parameters in cache key
   - Version in cache key for schema changes
   - Consider timestamp for time-based queries

   ```php
   public function getUsersByType($type, $limit = 10)
   {
       $cacheKey = "users.type.{$type}.limit.{$limit}";
       
       return Cache::remember($cacheKey, 60, function () use ($type, $limit) {
           return User::where('type', $type)
               ->take($limit)
               ->get();
       });
   }
   ```

6. **Cache Keys from Query**:
   - Generate cache keys from query SQL
   - Handle dynamic queries
   - Include bindings for uniqueness

   ```php
   public function getCachedQuery($query, $ttl = 60)
   {
       $sql = $query->toSql();
       $bindings = $query->getBindings();
       $key = md5($sql . serialize($bindings));
       
       return Cache::remember('query.' . $key, $ttl, function () use ($query) {
           return $query->get();
       });
   }
   ```

### Full Page Caching

Caching entire HTTP responses for maximum performance:

1. **Response Caching Middleware**:
   - Cache entire responses
   - Set cache headers
   - Configure cacheable routes

   ```php
   // In Kernel.php
   protected $routeMiddleware = [
       'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
   ];
   
   // In routes
   Route::middleware('cache.headers:public;max_age=3600;etag')->get('/posts', function () {
       return view('posts.index', ['posts' => Post::all()]);
   });
   ```

2. **Cache Control Headers**:
   - Configure browser and CDN caching
   - ETag for conditional requests
   - Last-Modified for time-based validation

   ```php
   return response()
       ->view('posts.show', ['post' => $post])
       ->header('Cache-Control', 'public, max-age=3600')
       ->header('ETag', md5($post->updated_at));
   ```

3. **Response Caching**:
   - Manually cache rendered views
   - Use for dynamic but infrequently updated content
   - Clear cache on content updates

   ```php
   public function index()
   {
       $cacheKey = 'posts.index';
       
       if (Cache::has($cacheKey)) {
           return response(Cache::get($cacheKey))
               ->header('X-Cache', 'HIT');
       }
       
       $view = view('posts.index', ['posts' => Post::all()])->render();
       Cache::put($cacheKey, $view, 3600);
       
       return response($view)
           ->header('X-Cache', 'MISS');
   }
   ```

4. **Dynamic Parts with Edge Side Includes (ESI)**:
   - Cache most content
   - Dynamic includes for personalized sections
   - Requires reverse proxy support (Varnish, Symfony HttpCache)

5. **Page Caching with Artisan**:
   - Generate static HTML files
   - Bypass PHP completely for maximum performance
   - Requires manual cache clearing

   ```bash
   # Create a command to generate static pages
   php artisan make:command GenerateStaticPages
   
   # In the command
   public function handle()
   {
       $response = Http::get('http://your-app.test/posts');
       Storage::disk('public')->put('static/posts.html', $response->body());
   }
   ```

### Route Caching

Optimize route registration for production:

1. **Route Cache Command**:
   - Generate a cached routes file
   - Significant performance improvement
   - Must be regenerated after route changes

   ```bash
   # Generate route cache
   php artisan route:cache
   
   # Clear route cache
   php artisan route:clear
   ```

2. **Limitations**:
   - Cannot cache routes with closures
   - Must use controller classes
   - Include in deployment process

   ```php
   // Bad - Cannot be cached
   Route::get('/user', function () {
       return User::all();
   });
   
   // Good - Can be cached
   Route::get('/user', [UserController::class, 'index']);
   ```

3. **Deployment Strategy**:
   - Clear cache first
   - Generate new cache
   - Build into CI/CD pipeline

   ```bash
   # Deployment script
   php artisan route:clear
   php artisan route:cache
   ```

### View Caching

Compile and cache Blade templates:

1. **View Compilation**:
   - Blade templates compiled to PHP
   - Automatically cached until modified
   - Manual compilation for deployment

   ```bash
   # Compile all Blade templates
   php artisan view:cache
   
   # Clear compiled views
   php artisan view:clear
   ```

2. **Component Caching**:
   - Cache reusable components
   - Use for static or rarely changing components
   - Clear on component updates

   ```php
   // Cache a component or partial view
   $renderedComponent = Cache::remember('components.navbar', 3600, function () {
       return view('components.navbar')->render();
   });
   ```

3. **Section Caching**:
   - Cache specific sections of views
   - Keep dynamic parts outside cache
   - Use for complex rendered elements

   ```php
   // In Blade template
   @php
   $sidebarCache = 'sidebar.' . auth()->id();
   @endphp
   
   <div class="content">{{ $content }}</div>
   
   <div class="sidebar">
       @if (Cache::has($sidebarCache))
           {!! Cache::get($sidebarCache) !!}
       @else
           @php
           $sidebar = view('partials.sidebar', ['user' => auth()->user()])->render();
           Cache::put($sidebarCache, $sidebar, 3600);
           @endphp
           {!! $sidebar !!}
       @endif
   </div>
   ```

### Artisan Optimization Commands

Laravel provides several commands to optimize application performance:

1. **Configuration Caching**:
   - Cache all config files into single file
   - Reduce file I/O and processing
   - Must rerun after config changes

   ```bash
   # Cache config
   php artisan config:cache
   
   # Clear config cache
   php artisan config:clear
   ```

2. **Route Caching**:
   - Cache all routes into single file
   - Significant routing performance boost
   - Cannot use route closures

   ```bash
   # Cache routes
   php artisan route:cache
   
   # Clear route cache
   php artisan route:clear
   ```

3. **View Caching**:
   - Pre-compile all Blade templates
   - Reduces first-request latency
   - Automatically updates when views change

   ```bash
   # Compile views
   php artisan view:cache
   
   # Clear compiled views
   php artisan view:clear
   ```

4. **Event Caching**:
   - Cache all event to listener mappings
   - Improve event dispatching performance
   - Must rerun after listener changes

   ```bash
   # Cache events
   php artisan event:cache
   
   # Clear event cache
   php artisan event:clear
   ```

5. **Composer Optimization**:
   - Optimize Composer's class autoloader
   - Improve class loading performance
   - Run during deployment

   ```bash
   composer install --optimize-autoloader --no-dev
   ```

6. **Deployment Script**:
   - Combine all optimization commands
   - Include in deployment process
   - Ensures consistent optimization

   ```bash
   # deployment.sh
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan event:cache
   ```

## Testing in Laravel

### PHPUnit Configuration

Configuring PHPUnit for Laravel testing:

1. **Basic Configuration**:
   - PHPUnit configuration in `phpunit.xml`
   - Environment variables for testing
   - Test database settings

   ```xml
   <!-- phpunit.xml -->
   <phpunit>
       <testsuites>
           <testsuite name="Unit">
               <directory suffix="Test.php">./tests/Unit</directory>
           </testsuite>
           <testsuite name="Feature">
               <directory suffix="Test.php">./tests/Feature</directory>
           </testsuite>
       </testsuites>
       <php>
           <server name="APP_ENV" value="testing"/>
           <server name="DB_CONNECTION" value="sqlite"/>
           <server name="DB_DATABASE" value=":memory:"/>
           <!-- Other environment variables -->
       </php>
   </phpunit>
   ```

2. **Test Directory Structure**:
   - Unit tests in `tests/Unit`
   - Feature tests in `tests/Feature`
   - Custom test suites if needed

3. **Database Configuration**:
   - Use SQLite in-memory for speed
   - Separate test database for complex tests
   - Database transactions for isolation

   ```php
   // DatabaseTransactions trait
   use Illuminate\Foundation\Testing\DatabaseTransactions;
   
   class UserTest extends TestCase
   {
       use DatabaseTransactions;
       
       // Each test runs in a transaction that rolls back
   }
   ```

4. **Running Tests**:
   - Run all tests or specific test files
   - Filter tests by name
   - Generate coverage reports

   ```bash
   # Run all tests
   php artisan test
   
   # Run specific test file
   php artisan test --filter=UserTest
   
   # Run specific test method
   php artisan test --filter=UserTest::testRegistration
   
   # Generate code coverage report
   php artisan test --coverage
   ```

### Feature vs Unit Testing

Understanding different types of tests in Laravel:

1. **Unit Tests**:
   - Test individual components in isolation
   - Fast and focused
   - Mock dependencies
   - Located in `tests/Unit`

   ```php
   namespace Tests\Unit;
   
   use PHPUnit\Framework\TestCase;
   use App\Services\Calculator;
   
   class CalculatorTest extends TestCase
   {
       public function testAddition()
       {
           $calculator = new Calculator();
           $result = $calculator->add(5, 3);
           $this->assertEquals(8, $result);
       }
   }
   ```

2. **Feature Tests**:
   - Test complete features or endpoints
   - Integration testing across components
   - HTTP requests and responses
   - Located in `tests/Feature`

   ```php
   namespace Tests\Feature;
   
   use Illuminate\Foundation\Testing\RefreshDatabase;
   use Tests\TestCase;
   
   class UserRegistrationTest extends TestCase
   {
       use RefreshDatabase;
       
       public function testUserCanRegister()
       {
           $response = $this->post('/register', [
               'name' => 'Test User',
               'email' => 'test@example.com',
               'password' => 'password',
               'password_confirmation' => 'password',
           ]);
           
           $response->assertRedirect('/home');
           $this->assertDatabaseHas('users', [
               'email' => 'test@example.com',
           ]);
       }
   }
   ```

3. **When to Use Each Type**:
   - Unit tests for individual classes/methods
   - Feature tests for complete user flows
   - Unit for complex business logic
   - Feature for API endpoints and UI flows

4. **Test Pyramid**:
   - Many unit tests (base of pyramid)
   - Fewer integration tests (middle)
   - Fewer still feature tests (top)
   - Balance speed and coverage

### HTTP Tests

Testing HTTP endpoints and responses:

1. **Basic HTTP Testing**:
   - Send requests to application
   - Test responses and side effects
   - Assert status codes, content, headers

   ```php
   public function testBasicTest()
   {
       $response = $this->get('/');
       
       $response->assertStatus(200);
       $response->assertSee('Welcome');
   }
   ```

2. **Testing JSON APIs**:
   - Send and test JSON requests
   - Validate JSON structure and data
   - Test API authentication

   ```php
   public function testGetUsersList()
   {
       $user = User::factory()->create();
       
       $response = $this->actingAs($user)
           ->getJson('/api/users');
       
       $response->assertStatus(200)
           ->assertJsonStructure([
               'data' => [
                   '*' => ['id', 'name', 'email']
               ],
               'links',
               'meta',
           ]);
   }
   ```

3. **Form Submissions**:
   - Test form submissions and validation
   - Check database changes
   - Test redirects and flash messages

   ```php
   public function testCreatePost()
   {
       $user = User::factory()->create();
       
       $response = $this->actingAs($user)
           ->post('/posts', [
               'title' => 'Test Post',
               'content' => 'This is a test post content.'
           ]);
       
       $response->assertRedirect('/posts');
       $this->assertDatabaseHas('posts', [
           'title' => 'Test Post',
           'user_id' => $user->id,
       ]);
       $response->assertSessionHas('status', 'Post created successfully!');
   }
   ```

4. **Authentication Testing**:
   - Test as different users
   - Verify authorization rules
   - Test protected routes

   ```php
   public function testAdminCanAccessDashboard()
   {
       $admin = User::factory()->create(['role' => 'admin']);
       $user = User::factory()->create(['role' => 'user']);
       
       // Admin can access
       $this->actingAs($admin)
           ->get('/admin/dashboard')
           ->assertStatus(200);
       
       // Regular user cannot access
       $this->actingAs($user)
           ->get('/admin/dashboard')
           ->assertStatus(403);
   }
   ```

5. **File Uploads**:
   - Test file upload functionality
   - Verify file storage
   - Check validation rules

   ```php
   public function testUserCanUploadAvatar()
   {
       Storage::fake('avatars');
       
       $user = User::factory()->create();
       $file = UploadedFile::fake()->image('avatar.jpg');
       
       $response = $this->actingAs($user)
           ->post('/avatar', [
               'avatar' => $file,
           ]);
       
       $response->assertRedirect();
       Storage::disk('avatars')->assertExists($file->hashName());
   }
   ```

### Database Testing

Testing database interactions:

1. **Database Setup**:
   - Use traits for database handling
   - Choose between transaction or migration-based approaches
   - Configure test database

   ```php
   // Refresh database between tests
   use Illuminate\Foundation\Testing\RefreshDatabase;
   
   class UserTest extends TestCase
   {
       use RefreshDatabase;
       
       // Tests that need a fresh database
   }
   
   // Use transactions for faster tests
   use Illuminate\Foundation\Testing\DatabaseTransactions;
   
   class PostTest extends TestCase
   {
       use DatabaseTransactions;
       
       // Tests that run in transactions
   }
   ```

2. **Model Factories**:
   - Create test data easily
   - Define relationships
   - Use states for variations

   ```php
   // Create single model
   $user = User::factory()->create();
   
   // Create with specific attributes
   $admin = User::factory()->create([
       'role' => 'admin',
   ]);
   
   // Create with relationships
   $user = User::factory()
       ->has(Post::factory()->count(3))
       ->create();
   
   // Create with state
   $user = User::factory()->verified()->create();
   ```

3. **Database Assertions**:
   - Verify database state
   - Check record existence
   - Compare values

   ```php
   // Assert record exists
   $this->assertDatabaseHas('users', [
       'email' => 'test@example.com',
   ]);
   
   // Assert record missing
   $this->assertDatabaseMissing('users', [
       'email' => 'nonexistent@example.com',
   ]);
   
   // Assert record count
   $this->assertDatabaseCount('posts', 5);
   ```

4. **Seeding Test Data**:
   - Create consistent environment
   - Use special test seeders
   - Reset between tests

   ```php
   class TestDatabaseSeeder extends Seeder
   {
       public function run()
       {
           User::factory(10)->create();
           $admin = User::factory()->create([
               'email' => 'admin@example.com',
               'role' => 'admin',
           ]);
       }
   }
   
   // In test
   public function setUp(): void
   {
       parent::setUp();
       $this->seed(TestDatabaseSeeder::class);
   }
   ```

5. **Query Testing**:
   - Test scope methods
   - Verify query constraints
   - Check ordered results

   ```php
   public function testActiveScopeReturnsOnlyActiveUsers()
   {
       User::factory()->create(['active' => true]);
       User::factory()->create(['active' => false]);
       
       $activeUsers = User::active()->get();
       
       $this->assertCount(1, $activeUsers);
       $this->assertTrue($activeUsers->first()->active);
   }
   ```

### Mocking

Creating test doubles for dependencies:

1. **Basic Mocking**:
   - Mock classes and interfaces
   - Specify expected method calls
   - Set return values

   ```php
   public function testEmailSending()
   {
       // Create mock
       $mailer = $this->mock(Mailer::class);
       
       // Set expectations
       $mailer->shouldReceive('send')
           ->once()
           ->with('welcome.blade.php', ['user' => Mockery::any()], Mockery::any())
           ->andReturn(true);
       
       // Inject mock into service
       $userService = new UserService($mailer);
       $userService->register(['name' => 'Test', 'email' => 'test@example.com']);
   }
   ```

2. **Spies**:
   - Verify method calls after execution
   - Less upfront configuration
   - More flexible assertions

   ```php
   public function testLogsUserActivity()
   {
       $logger = $this->spy(Logger::class);
       
       $service = new UserService($logger);
       $service->login($user);
       
       $logger->shouldHaveReceived('log')
           ->with('User logged in', ['id' => $user->id]);
   }
   ```

3. **Partial Mocks**:
   - Mock only specific methods
   - Use real implementation for others
   - Useful for complex classes

   ```php
   public function testSavingWithoutDispatchingEvents()
   {
       $post = $this->partialMock(Post::class, function ($mock) {
           $mock->shouldReceive('dispatchEventsForModel')
               ->andReturn(null);
       });
       
       $post->title = 'New Title';
       $post->save();
       
       $this->assertEquals('New Title', $post->fresh()->title);
   }
   ```

4. **Mocking Facades**:
   - Mock facade calls
   - Set expectations on static methods
   - Test code that uses facades

   ```php
   public function testUserRegistrationSendsEmail()
   {
       Mail::fake();
       
       $response = $this->post('/register', [
           'name' => 'Test User',
           'email' => 'test@example.com',
           'password' => 'password',
           'password_confirmation' => 'password',
       ]);
       
       Mail::assertSent(WelcomeEmail::class, function ($mail) {
           return $mail->hasTo('test@example.com');
       });
   }
   ```

5. **Service Container Mocking**:
   - Bind mocks to container
   - Replace real implementations
   - Test interactions between services

   ```php
   public function testOrderProcessing()
   {
       $paymentProcessor = $this->mock(PaymentProcessor::class);
       $paymentProcessor->shouldReceive('charge')
           ->once()
           ->andReturn(true);
       
       $this->app->instance(PaymentProcessor::class, $paymentProcessor);
       
       // Service will now use the mocked payment processor
       $orderService = $this->app->make(OrderService::class);
       $result = $orderService->process($order);
       
       $this->assertTrue($result);
   }
   ```

### Test Coverage

Measuring and improving test coverage:

1. **Code Coverage Tools**:
   - PhpUnit with XDebug
   - Generate coverage reports
   - Identify untested code

   ```bash
   # Generate coverage report
   vendor/bin/phpunit --coverage-html coverage
   ```

2. **Coverage Thresholds**:
   - Set minimum coverage requirements
   - Fail builds if coverage drops
   - Focus on critical code paths

3. **What to Test**:
   - Business logic (high priority)
   - Edge cases and error paths
   - Complex algorithms
   - Balance coverage with effort

4. **CI Integration**:
   - Run tests in CI pipeline
   - Generate coverage reports
   - Track trends over time

   ```yaml
   # GitHub Actions workflow
   name: Tests
   
   on: [push, pull_request]
   
   jobs:
     tests:
       runs-on: ubuntu-latest
       
       steps:
         - uses: actions/checkout@v3
         
         - name: Setup PHP
           uses: shivammathur/setup-php@v2
           with:
             php-version: '8.1'
             coverage: xdebug
             
         - name: Install Dependencies
           run: composer install --prefer-dist --no-interaction
           
         - name: Execute Tests
           run: vendor/bin/phpunit --coverage-clover=coverage.xml
           
         - name: Upload Coverage Report
           uses: codecov/codecov-action@v3
           with:
             file: ./coverage.xml
   ```

### TDD Approaches

Test-Driven Development in Laravel:

1. **TDD Basics**:
   - Write test first, then implementation
   - Red-Green-Refactor cycle
   - Focus on requirements

   ```php
   // Step 1: Write failing test
   public function testUserCanBeDeactivated()
   {
       $user = User::factory()->create(['active' => true]);
       
       $user->deactivate();
       
       $this->assertFalse($user->active);
       $this->assertNotNull($user->deactivated_at);
   }
   
   // Step 2: Implement functionality to make test pass
   // In User model:
   public function deactivate()
   {
       $this->active = false;
       $this->deactivated_at = now();
       $this->save();
   }
   
   // Step 3: Refactor if needed
   ```

2. **Laravel-Specific TDD**:
   - Test routes before implementing controllers
   - Test validation rules before implementing requests
   - Test database interactions before implementing models

   ```php
   // Test route exists
   public function testDashboardRouteExists()
   {
       $this->get('/dashboard')->assertStatus(200);
   }
   
   // Test validation
   public function testPostValidation()
   {
       $response = $this->post('/posts', []);
       
       $response->assertSessionHasErrors(['title', 'content']);
   }
   ```

3. **Outside-In TDD**:
   - Start with feature/acceptance tests
   - Work inward to unit tests
   - Focus on user perspective

4. **Inside-Out TDD**:
   - Start with unit tests
   - Build up to feature tests
   - Focus on technical design

5. **BDD with Laravel**:
   - Behavior-Driven Development
   - Describe features in business language
   - Use tools like Behat or Codeception

   ```php
   // Feature test with BDD style
   /** @test */
   public function user_can_view_their_profile()
   {
       // Given
       $user = User::factory()->create();
       
       // When
       $response = $this->actingAs($user)->get('/profile');
       
       // Then
       $response->assertStatus(200);
       $response->assertSee($user->name);
       $response->assertSee($user->email);
   }
   ```

## API Development

### RESTful API Design

Designing clean, consistent RESTful APIs:

1. **Resource Naming**:
   - Use plural nouns for resource collections
   - Hierarchical relationships with nested resources
   - Consistent naming conventions

   ```php
   // Resource routes
   Route::apiResource('users', UserController::class);
   Route::apiResource('posts', PostController::class);
   Route::apiResource('users.posts', UserPostController::class);
   
   // Results in endpoints like:
   // GET /api/users
   // GET /api/users/{user}
   // GET /api/posts
   // GET /api/posts/{post}
   // GET /api/users/{user}/posts
   ```

2. **HTTP Methods**:
   - GET: Retrieve resources
   - POST: Create resources
   - PUT/PATCH: Update resources
   - DELETE: Remove resources

   ```php
   // REST operations
   GET /api/users               // List users
   GET /api/users/{id}          // Get specific user
   POST /api/users              // Create user
   PUT /api/users/{id}          // Update user
   PATCH /api/users/{id}        // Partial update
   DELETE /api/users/{id}       // Delete user
   ```

3. **Status Codes**:
   - 200: OK (Success)
   - 201: Created (Resource created)
   - 204: No Content (Success, no response body)
   - 400: Bad Request (Client error)
   - 401: Unauthorized (Authentication required)
   - 403: Forbidden (Authenticated but not authorized)
   - 404: Not Found (Resource doesn't exist)
   - 422: Unprocessable Entity (Validation errors)
   - 500: Server Error

   ```php
   // Using appropriate status codes
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:users',
       ]);
       
       $user = User::create($validated);
       
       return response()->json(['data' => $user], 201);
   }
   
   public function destroy(User $user)
   {
       $user->delete();
       
       return response()->noContent(204);
   }
   ```

4. **Request Validation**:
   - Validate all input
   - Return clear validation errors
   - Use form requests for complex validation

   ```php
   class StorePostRequest extends FormRequest
   {
       public function rules()
       {
           return [
               'title' => 'required|string|max:255',
               'content' => 'required|string',
               'category_id' => 'required|exists:categories,id',
               'tags' => 'sometimes|array',
               'tags.*' => 'exists:tags,id',
           ];
       }
   }
   ```

5. **Response Structure**:
   - Consistent format for all responses
   - Include status and metadata
   - Wrap data in data property
   - Use pagination for collections

   ```php
   // Response structure
   {
       "data": [...],
       "meta": {
           "current_page": 1,
           "last_page": 10,
           "per_page": 15,
           "total": 150
       },
       "links": {
           "first": "https://example.com/api/users?page=1",
           "last": "https://example.com/api/users?page=10",
           "prev": null,
           "next": "https://example.com/api/users?page=2"
       }
   }
   ```

6. **Error Handling**:
   - Consistent error format
   - Include status code and message
   - Add detailed validation errors

   ```php
   // Error response structure
   {
       "message": "The given data was invalid.",
       "errors": {
           "email": [
               "The email field is required.",
               "The email must be a valid email address."
           ],
           "password": [
               "The password field is required."
           ]
       }
   }
   ```

### API Resources and Transformations

Transforming models into consistent API responses:

1. **API Resources**:
   - Transform models into JSON
   - Control included attributes
   - Format values consistently

   ```php
   // Generate resource class
   php artisan make:resource UserResource
   
   // Basic resource
   class UserResource extends JsonResource
   {
       public function toArray($request)
       {
           return [
               'id' => $this->id,
               'name' => $this->name,
               'email' => $this->email,
               'created_at' => $this->created_at->toIso8601String(),
               'updated_at' => $this->updated_at->toIso8601String(),
           ];
       }
   }
   
   // Usage in controller
   public function show(User $user)
   {
       return new UserResource($user);
   }
   ```

2. **Resource Collections**:
   - Handle collections of resources
   - Add pagination metadata
   - Custom collection classes

   ```php
   // Using collection
   public function index()
   {
       $users = User::paginate();
       return UserResource::collection($users);
   }
   
   // Custom collection class
   class UserCollection extends ResourceCollection
   {
       public function toArray($request)
       {
           return [
               'data' => $this->collection,
               'meta' => [
                   'total_users' => $this->collection->count(),
                   'custom_data' => 'value',
               ],
           ];
       }
   }
   ```

3. **Nested Resources**:
   - Include relationships
   - Conditional loading
   - Control nesting depth

   ```php
   class PostResource extends JsonResource
   {
       public function toArray($request)
       {
           return [
               'id' => $this->id,
               'title' => $this->title,
               'content' => $this->content,
               'author' => new UserResource($this->whenLoaded('user')),
               'comments' => CommentResource::collection(
                   $this->whenLoaded('comments')
               ),
               'comment_count' => $this->when(
                   $this->comments_count !== null,
                   $this->comments_count
               ),
           ];
       }
   }
   ```

4. **Conditional Attributes**:
   - Include attributes conditionally
   - Show different data based on user
   - Optimize response size

   ```php
   // Conditional attributes
   public function toArray($request)
   {
       return [
           'id' => $this->id,
           'name' => $this->name,
           'email' => $this->email,
           // Only show if viewing own profile
           'phone' => $this->when(
               $request->user()->id === $this->id,
               $this->phone
           ),
           // Different value based on condition
           'type' => $this->when(
               $this->role === 'admin',
               'Administrator',
               'Regular User'
           ),
       ];
   }
   ```

5. **Custom Response Format**:
   - Add headers
   - Custom HTTP status codes
   - Configure JsonResource defaults

   ```php
   // Custom response with resource
   return (new UserResource($user))
       ->response()
       ->header('X-Value', 'True')
       ->setStatusCode(201);
   
   // Configure JsonResource::withoutWrapping()
   // In AppServiceProvider
   public function boot()
   {
       JsonResource::withoutWrapping();
   }
   ```

### API Versioning Strategies

Managing API versions for backward compatibility:

1. **URL Versioning**:
   - Include version in URL path
   - Most explicit approach
   - Easy to understand

   ```php
   // Routes with version in URL
   Route::prefix('api/v1')->group(function () {
       Route::apiResource('users', Api\V1\UserController::class);
   });
   
   Route::prefix('api/v2')->group(function () {
       Route::apiResource('users', Api\V2\UserController::class);
   });
   ```

2. **HTTP Header Versioning**:
   - Use Accept or custom header
   - Same URL, different implementations
   - Requires middleware to route requests

   ```php
   // API version middleware
   class ApiVersion
   {
       public function handle($request, Closure $next)
       {
           // Use Accept header - "application/vnd.api.v2+json"
           $version = 'v1';
           
           if ($request->hasHeader('Accept')) {
               $accept = $request->header('Accept');
               if (strpos($accept, 'application/vnd.api.v2+json') !== false) {
                   $version = 'v2';
               }
           }
           
           // Or custom header
           if ($request->hasHeader('X-API-Version')) {
               $version = $request->header('X-API-Version');
           }
           
           $request->route()->setParameter('version', $version);
           
           return $next($request);
       }
   }
   
   // Route definition
   Route::middleware('api.version')->group(function () {
       Route::apiResource('users', 'Api\UserController');
   });
   
   // In controller
   public function index(Request $request)
   {
       $version = $request->route('version');
       
       if ($version === 'v2') {
           // V2 implementation
       } else {
           // V1 implementation
       }
   }
   ```

3. **Query Parameter Versioning**:
   - Include version in query string
   - Simple to implement
   - Less RESTful

   ```php
   // In controller
   public function index(Request $request)
   {
       $version = $request->query('version', 'v1');
       
       // Route to appropriate handler
   }
   ```

4. **Content Negotiation**:
   - Use Accept header with MIME types
   - Follows HTTP standards
   - More complex to implement

   ```php
   // Content negotiation middleware
   public function handle($request, Closure $next)
   {
       $acceptHeader = $request->header('Accept');
       
       // Default version
       $version = 'v1';
       
       // Parse Accept header
       if (preg_match('/application\/vnd\.myapp\.([v1-9]+)\+json/', $acceptHeader, $matches)) {
           $version = $matches[1];
       }
       
       // Set version in request for later use
       $request->merge(['api_version' => $version]);
       
       return $next($request);
   }
   ```

5. **Namespace Organization**:
   - Separate controllers by version
   - Reuse code with inheritance
   - Clear separation of concerns

   ```php
   // V1 controller
   namespace App\Http\Controllers\Api\V1;
   
   class UserController extends Controller
   {
       // V1 implementation
   }
   
   // V2 controller extending V1
   namespace App\Http\Controllers\Api\V2;
   
   use App\Http\Controllers\Api\V1\UserController as V1UserController;
   
   class UserController extends V1UserController
   {
       // Override methods that changed in V2
       public function index()
       {
           // V2 implementation
       }
       
       // Inherit methods that haven't changed
   }
   ```

### API Authentication

Securing your API endpoints:

1. **Token-Based Authentication**:
   - Simple API tokens
   - Personal access tokens
   - Sanctum for SPA and mobile

   ```php
   // Sanctum token authentication
   Route::middleware('auth:sanctum')->group(function () {
       Route::get('/user', function (Request $request) {
           return $request->user();
       });
       
       Route::apiResource('posts', PostController::class);
   });
   
   // Creating tokens
   $token = $user->createToken('api-token')->plainTextToken;
   
   // Token in request header
   // Authorization: Bearer {token}
   ```

2. **OAuth2 with Passport**:
   - Full OAuth2 implementation
   - Client credentials grant
   - Authorization code flow
   - Password grant

   ```php
   // Install Passport
   composer require laravel/passport
   
   // In AuthServiceProvider
   public function boot()
   {
       Passport::routes();
       Passport::tokensExpireIn(now()->addDays(15));
   }
   
   // Protect routes
   Route::middleware('auth:api')->group(function () {
       Route::apiResource('posts', PostController::class);
   });
   ```

3. **JWT Authentication**:
   - Stateless authentication
   - Compact tokens
   - Cross-domain capability

   ```php
   // Using tymon/jwt-auth package
   Route::middleware('auth:api')->group(function () {
       Route::apiResource('posts', PostController::class);
   });
   
   // Login and get token
   public function login(Request $request)
   {
       $credentials = $request->only(['email', 'password']);
       
       if (!$token = auth('api')->attempt($credentials)) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }
       
       return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth('api')->factory()->getTTL() * 60
       ]);
   }
   ```

4. **API Keys**:
   - Simple key-based authentication
   - Custom implementation
   - Good for third-party integrations

   ```php
   // API key middleware
   class VerifyApiKey
   {
       public function handle($request, Closure $next)
       {
           $apiKey = $request->header('X-API-Key');
           
           if (!$apiKey) {
               return response()->json(['error' => 'API key missing'], 401);
           }
           
           $apiUser = ApiKey::where('key', $apiKey)->first();
           
           if (!$apiUser) {
               return response()->json(['error' => 'Invalid API key'], 401);
           }
           
           // Attach API user to request
           $request->merge(['api_user' => $apiUser]);
           
           return $next($request);
       }
   }
   
   // Register middleware
   Route::middleware('api.key')->group(function () {
       Route::apiResource('products', ProductController::class);
   });
   ```

5. **Multiple Authentication Guards**:
   - Different authentication for different endpoints
   - Mix of token types
   - Flexible security model

   ```php
   // In config/auth.php
   'guards' => [
       'web' => [
           'driver' => 'session',
           'provider' => 'users',
       ],
       'api' => [
           'driver' => 'passport',
           'provider' => 'users',
       ],
       'api-key' => [
           'driver' => 'custom-api-key',
           'provider' => 'api-clients',
       ],
   ],
   
   // Mixed routes
   Route::middleware('auth:api')->group(function () {
       Route::apiResource('users', UserController::class);
   });
   
   Route::middleware('auth:api-key')->group(function () {
       Route::apiResource('products', ProductController::class);
   });
   ```

### Rate Limiting

Protecting your API from abuse:

1. **Basic Rate Limiting**:
   - Limit requests per minute
   - IP-based or user-based
   - Built-in middleware

   ```php
   // In RouteServiceProvider
   Route::middleware([
       'api',
       'throttle:60,1'  // 60 requests per minute
   ])->prefix('api')
     ->group(base_path('routes/api.php'));
     
   // Custom limits for specific routes
   Route::middleware('throttle:5,1')->group(function () {
       Route::post('/login', [AuthController::class, 'login']);
   });
   ```

2. **User-Based Limits**:
   - Different limits for authenticated users
   - Identify users by token or session
   - Higher limits for premium users

   ```php
   // Different limits for guests vs. users
   Route::middleware('throttle:10|60,1')->group(function () {
       // 10 requests per minute for guests
       // 60 requests per minute for authenticated users
   });
   
   // Dynamic limits based on user type
   Route::middleware(['auth:api', 'throttle:api'])->group(function () {
       Route::get('/posts', [PostController::class, 'index']);
   });
   
   // In RouteServiceProvider
   RateLimiter::for('api', function (Request $request) {
       $user = $request->user();
       
       return $user 
           ? Limit::perMinute($user->isPremium() ? 100 : 60)
           : Limit::perMinute(10);
   });
   ```

3. **Response Headers**:
   - Include rate limit information in responses
   - Help clients manage their usage
   - Standard HTTP headers

   ```
   X-RateLimit-Limit: 60
   X-RateLimit-Remaining: 58
   X-RateLimit-Reset: 1620035340
   ```

4. **Advanced Rate Limiting**:
   - Different limits for different endpoints
   - Sliding windows vs. fixed windows
   - Distributed rate limiting with Redis

   ```php
   // Rate limits by route groups
   Route::middleware('throttle:search-api')->group(function () {
       Route::get('/search', [SearchController::class, 'index']);
   });
   
   Route::middleware('throttle:standard-api')->group(function () {
       Route::apiResource('posts', PostController::class);
   });
   
   // In RouteServiceProvider
   RateLimiter::for('search-api', function (Request $request) {
       return Limit::perMinute(10);
   });
   
   RateLimiter::for('standard-api', function (Request $request) {
       return Limit::perMinute(60);
   });
   ```

5. **Custom Rate Limiters**:
   - Create complex limiting logic
   - Combine multiple factors
   - Business-specific rules

   ```php
   // Custom rate limiter
   RateLimiter::for('uploads', function (Request $request) {
       $user = $request->user();
       
       if (!$user) {
           return Limit::perDay(5);
       }
       
       if ($user->isSubscribed()) {
           return Limit::perDay(500);
       }
       
       if ($user->isVerified()) {
           return Limit::perDay(100);
       }
       
       return Limit::perDay(10);
   });
   ```

### API Documentation

Creating comprehensive API documentation:

1. **API Documentation Tools**:
   - Swagger/OpenAPI
   - Scribe
   - Laravel API Documentation Generator
   - Postman Collections

   ```bash
   # Install Scribe
   composer require knuckleswtf/scribe
   
   # Publish config
   php artisan vendor:publish --provider="Knuckles\Scribe\ScribeServiceProvider" --tag=scribe-config
   
   # Generate docs
   php artisan scribe:generate
   ```

2. **Documenting Controllers**:
   - Use annotations/docblocks
   - Describe endpoints, parameters
   - Show request/response examples

   ```php
   /**
    * @group User Management
    *
    * APIs for managing users
    */
   class UserController extends Controller
   {
       /**
        * List all users
        *
        * Get a paginated list of all users.
        *
        * @queryParam page integer Page number. Default: 1
        * @queryParam per_page integer Items per page. Default: 15
        * @queryParam search string Search term for user name/email.
        *
        * @response {
        *   "data": [
        *     {
        *       "id": 1,
        *       "name": "John Doe",
        *       "email": "john@example.com",
        *       "created_at": "2023-01-01T12:00:00Z"
        *     }
        *   ],
        *   "links": {
        *     "first": "http://example.com/api/users?page=1",
        *     "last": "http://example.com/api/users?page=5",
        *     "prev": null,
        *     "next": "http://example.com/api/users?page=2"
        *   },
        *   "meta": {
        *     "current_page": 1,
        *     "last_page": 5,
        *     "per_page": 15,
        *     "total": 68
        *   }
        * }
        */
       public function index(Request $request)
       {
           // Implementation
       }
   }
   ```

3. **API Versioning in Documentation**:
   - Separate docs for different versions
   - Clear version indicators
   - Migration guides between versions

4. **Interactive Documentation**:
   - Try-it-now functionality
   - Request builders
   - Authentication support

5. **Documenting Authentication**:
   - Authentication methods
   - Token acquisition
   - Permissions and scopes

## Advanced Laravel Concepts

### Laravel Queues

Managing background processing and asynchronous tasks:

1. **Queue Configuration**:
   - Multiple drivers: Redis, SQS, database
   - Configure connection settings
   - Default queue names

   ```php
   // In config/queue.php
   'connections' => [
       'redis' => [
           'driver' => 'redis',
           'connection' => 'default',
           'queue' => env('REDIS_QUEUE', 'default'),
           'retry_after' => 90,
           'block_for' => null,
       ],
       
       'sqs' => [
           'driver' => 'sqs',
           'key' => env('AWS_ACCESS_KEY_ID'),
           'secret' => env('AWS_SECRET_ACCESS_KEY'),
           'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
           'queue' => env('SQS_QUEUE', 'your-queue-name'),
           'suffix' => env('SQS_SUFFIX'),
           'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
       ],
       
       'database' => [
           'driver' => 'database',
           'table' => 'jobs',
           'queue' => 'default',
           'retry_after' => 90,
       ],
   ],
   ```

2. **Creating Jobs**:
   - Define job classes
   - Handle retries and failures
   - Set timeout and tries

   ```php
   // Create job
   php artisan make:job ProcessPodcast
   
   // Job implementation
   class ProcessPodcast implements ShouldQueue
   {
       use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
       
       protected $podcast;
       
       public function __construct(Podcast $podcast)
       {
           $this->podcast = $podcast;
       }
       
       public function handle()
       {
           // Process the podcast
       }
       
       public function failed(Throwable $exception)
       {
           // Handle job failure
       }
   }
   ```

3. **Dispatching Jobs**:
   - Queue jobs for processing
   - Set delays and custom queues
   - Chain multiple jobs

   ```php
   // Basic dispatch
   ProcessPodcast::dispatch($podcast);
   
   // With delay
   ProcessPodcast::dispatch($podcast)->delay(now()->addMinutes(10));
   
   // Custom queue
   ProcessPodcast::dispatch($podcast)->onQueue('processing');
   
   // Job chaining
   ProcessPodcast::withChain([
       new OptimizePodcast($podcast),
       new ReleasePodcast($podcast)
   ])->dispatch($podcast);
   ```

4. **Running Queue Workers**:
   - Process queued jobs
   - Configure workers
   - Manage restarts and timeouts

   ```bash
   # Start queue worker
   php artisan queue:work
   
   # Specify connection and queue
   php artisan queue:work redis --queue=high,default
   
   # With options
   php artisan queue:work --tries=3 --timeout=90
   
   # As daemon
   php artisan queue:work --daemon
   ```

5. **Supervisor Configuration**:
   - Keep workers running
   - Auto-restart failed workers
   - Process monitoring

   ```ini
   ; /etc/supervisor/conf.d/laravel-worker.conf
   [program:laravel-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /path/to/project/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
   autostart=true
   autorestart=true
   stopasgroup=true
   killasgroup=true
   user=www-data
   numprocs=8
   redirect_stderr=true
   stdout_logfile=/path/to/project/storage/logs/worker.log
   stopwaitsecs=3600
   ```

6. **Job Middleware**:
   - Process jobs through middleware
   - Rate limiting
   - Unique jobs

   ```php
   use Illuminate\Queue\Middleware\WithoutOverlapping;
   use Illuminate\Queue\Middleware\RateLimited;
   
   public function middleware()
   {
       return [
           new WithoutOverlapping($this->podcast->id),
           new RateLimited('podcasts'),
       ];
   }
   ```

### Laravel Websockets

Real-time communication with WebSockets:

1. **Installation and Setup**:
   - Laravel Websockets package
   - Configuration and dashboard
   - Authentication integration

   ```bash
   # Install Laravel WebSockets
   composer require beyondcode/laravel-websockets
   
   # Publish configuration
   php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
   
   # Run migrations (for stats)
   php artisan migrate
   ```

2. **Broadcasting Setup**:
   - Configure broadcasting driver
   - Set up channels and authentication
   - Pusher compatibility

   ```php
   // In config/broadcasting.php
   'default' => env('BROADCAST_DRIVER', 'pusher'),
   
   'connections' => [
       'pusher' => [
           'driver' => 'pusher',
           'key' => env('PUSHER_APP_KEY'),
           'secret' => env('PUSHER_APP_SECRET'),
           'app_id' => env('PUSHER_APP_ID'),
           'options' => [
               'cluster' => env('PUSHER_APP_CLUSTER'),
               'host' => env('PUSHER_HOST', '127.0.0.1'),
               'port' => env('PUSHER_PORT', 6001),
               'scheme' => env('PUSHER_SCHEME', 'http'),
               'useTLS' => false,
           ],
       ],
   ],
   ```

3. **Events and Channels**:
   - Create broadcastable events
   - Public and private channels
   - Presence channels for user lists

   ```php
   // Create event
   php artisan make:event NewMessage
   
   // In NewMessage class
   class NewMessage implements ShouldBroadcast
   {
       use Dispatchable, InteractsWithSockets, SerializesModels;
       
       public $message;
       
       public function __construct(Message $message)
       {
           $this->message = $message;
       }
       
       public function broadcastOn()
       {
           return new PrivateChannel('chat.' . $this->message->chat_id);
       }
       
       public function broadcastWith()
       {
           return [
               'id' => $this->message->id,
               'body' => $this->message->body,
               'user' => $this->message->user->only(['id', 'name']),
               'created_at' => $this->message->created_at->toIso8601String(),
           ];
       }
   }
   ```

4. **Channel Authorization**:
   - Set up channel routes
   - Authorize channel access
   - User authentication checks

   ```php
   // In routes/channels.php
   Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
       return $user->chats()->where('chat_id', $chatId)->exists();
   });
   
   Broadcast::channel('presence.chat.{chatId}', function ($user, $chatId) {
       if ($user->chats()->where('chat_id', $chatId)->exists()) {
           return ['id' => $user->id, 'name' => $user->name];
       }
   });
   ```

5. **Running WebSocket Server**:
   - Start the WebSocket server
   - Manage on production
   - Health checks and monitoring

   ```bash
   # Start WebSocket server
   php artisan websockets:serve
   
   # With specific port
   php artisan websockets:serve --port=6001
   
   # With debug output
   php artisan websockets:serve --debug
   ```

6. **Client-Side Implementation**:
   - Use Laravel Echo
   - Connect to channels
   - Listen for events

   ```javascript
   // Install required packages
   // npm install laravel-echo pusher-js

   // In resources/js/bootstrap.js
   import Echo from 'laravel-echo';
   import Pusher from 'pusher-js';
   
   window.Pusher = Pusher;
   
   window.Echo = new Echo({
       broadcaster: 'pusher',
       key: process.env.MIX_PUSHER_APP_KEY,
       wsHost: window.location.hostname,
       wsPort: 6001,
       forceTLS: false,
       disableStats: true,
   });
   
   // Listen to a channel
   Echo.private(`chat.${chatId}`)
       .listen('NewMessage', (e) => {
           console.log(e.message);
           // Update UI with new message
       });
   
   // Presence channel with user list
   Echo.join(`presence.chat.${chatId}`)
       .here((users) => {
           // Initial list of users
           console.log(users);
       })
       .joining((user) => {
           // User joined
           console.log(`${user.name} joined`);
       })
       .leaving((user) => {
           // User left
           console.log(`${user.name} left`);
       })
       .listen('NewMessage', (e) => {
           // New message in channel
       });
   ```

### Laravel Socialite

OAuth authentication with social providers:

1. **Installation and Configuration**:
   - Install Socialite package
   - Configure service providers
   - Set up OAuth credentials

   ```bash
   # Install Socialite
   composer require laravel/socialite
   ```

   ```php
   // In config/services.php
   'github' => [
       'client_id' => env('GITHUB_CLIENT_ID'),
       'client_secret' => env('GITHUB_CLIENT_SECRET'),
       'redirect' => env('GITHUB_REDIRECT_URI'),
   ],
   
   'google' => [
       'client_id' => env('GOOGLE_CLIENT_ID'),
       'client_secret' => env('GOOGLE_CLIENT_SECRET'),
       'redirect' => env('GOOGLE_REDIRECT_URI'),
   ],
   
   'facebook' => [
       'client_id' => env('FACEBOOK_CLIENT_ID'),
       'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
       'redirect' => env('FACEBOOK_REDIRECT_URI'),
   ],
   ```

2. **Authentication Flow**:
   - Redirect to provider
   - Handle OAuth callback
   - Retrieve user information

   ```php
   // Redirect to OAuth provider
   public function redirectToProvider($provider)
   {
       return Socialite::driver($provider)->redirect();
   }
   
   // Handle callback from OAuth provider
   public function handleProviderCallback($provider)
   {
       try {
           $socialUser = Socialite::driver($provider)->user();
       } catch (\Exception $e) {
           return redirect('/login')->with('error', 'OAuth error: ' . $e->getMessage());
       }
       
       // Find or create user
       $user = User::where('email', $socialUser->getEmail())->first();
       
       if (!$user) {
           $user = User::create([
               'name' => $socialUser->getName(),
               'email' => $socialUser->getEmail(),
               'password' => Hash::make(Str::random(16)),
           ]);
       }
       
       // Store provider info
       $user->socialProfiles()->updateOrCreate(
           ['provider' => $provider],
           [
               'provider_id' => $socialUser->getId(),
               'avatar' => $socialUser->getAvatar(),
               'token' => $socialUser->token,
               'refresh_token' => $socialUser->refreshToken,
           ]
       );
       
       // Log user in
       Auth::login($user, true);
       
       return redirect('/dashboard');
   }
   ```

3. **Social Profile Storage**:
   - Store OAuth provider details
   - Link multiple providers to one account
   - Access tokens for API calls

   ```php
   // SocialProfile model
   class SocialProfile extends Model
   {
       protected $fillable = [
           'user_id', 'provider', 'provider_id', 
           'avatar', 'token', 'refresh_token'
       ];
       
       public function user()
       {
           return $this->belongsTo(User::class);
       }
   }
   
   // Relation in User model
   public function socialProfiles()
   {
       return $this->hasMany(SocialProfile::class);
   }
   ```

4. **Customizing Scopes**:
   - Request specific permissions
   - Access additional data
   - Custom provider parameters

   ```php
   // Request additional scopes
   return Socialite::driver('google')
       ->scopes(['openid', 'profile', 'email', 'https://www.googleapis.com/auth/drive.readonly'])
       ->redirect();
   
   // With parameters
   return Socialite::driver('facebook')
       ->with(['auth_type' => 'rerequest'])
       ->redirect();
   ```

5. **Stateless Authentication**:
   - Use for API authentication
   - No sessions required
   - JWT or token-based auth

   ```php
   // Stateless authentication
   $socialUser = Socialite::driver('github')->stateless()->user();
   ```

### Laravel Horizon

Redis queue dashboard and monitoring:

1. **Installation and Setup**:
   - Install Horizon package
   - Publish configuration
   - Configure queue worker settings

   ```bash
   # Install Horizon
   composer require laravel/horizon
   
   # Publish configuration
   php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"
   
   # Start Horizon
   php artisan horizon
   ```

2. **Dashboard Access**:
   - Access web dashboard
   - Authorization configuration
   - Metrics and monitoring

   ```php
   // In app/Providers/HorizonServiceProvider.php
   protected function gate()
   {
       Gate::define('viewHorizon', function ($user) {
           return in_array($user->email, [
               'admin@example.com',
           ]);
       });
   }
   ```

3. **Worker Configuration**:
   - Multiple queue workers
   - Auto-balancing processes
   - Per-environment settings

   ```php
   // In config/horizon.php
   'environments' => [
       'production' => [
           'supervisor-1' => [
               'connection' => 'redis',
               'queue' => ['default', 'emails'],
               'balance' => 'auto',
               'processes' => 10,
               'tries' => 3,
           ],
           'supervisor-2' => [
               'connection' => 'redis',
               'queue' => ['import', 'export'],
               'balance' => 'auto',
               'processes' => 5,
               'tries' => 2,
           ],
       ],
       
       'local' => [
           'supervisor-1' => [
               'connection' => 'redis',
               'queue' => ['default', 'emails', 'import', 'export'],
               'balance' => 'auto',
               'processes' => 3,
               'tries' => 3,
           ],
       ],
   ],
   ```

4. **Job Tags**:
   - Tag jobs for filtering
   - Group related jobs
   - Track specific jobs

   ```php
   // In a job class
   public $tags = ['podcast', 'processing'];
   
   // Or dynamic tags
   public function tags()
   {
       return ['podcast:' . $this->podcast->id, 'processing'];
   }
   ```

5. **Production Deployment**:
   - Run as a service
   - Configure Supervisor
   - Restart strategies

   ```ini
   ; /etc/supervisor/conf.d/horizon.conf
   [program:horizon]
   process_name=%(program_name)s
   command=php /path/to/project/artisan horizon
   autostart=true
   autorestart=true
   user=www-data
   redirect_stderr=true
   stdout_logfile=/path/to/project/storage/logs/horizon.log
   stopwaitsecs=3600
   ```

### Laravel Echo

Real-time frontend with Laravel broadcasting:

1. **Installation and Setup**:
   - Install Echo package
   - Configure broadcasting driver
   - Client-side setup

   ```bash
   # Install npm packages
   npm install laravel-echo pusher-js
   ```

   ```javascript
   // In resources/js/bootstrap.js
   import Echo from 'laravel-echo';
   import Pusher from 'pusher-js';
   
   window.Pusher = Pusher;
   
   window.Echo = new Echo({
       broadcaster: 'pusher',
       key: process.env.MIX_PUSHER_APP_KEY,
       cluster: process.env.MIX_PUSHER_APP_CLUSTER,
       wsHost: window.location.hostname,
       wsPort: 6001,
       forceTLS: false,
       disableStats: true,
   });
   ```

2. **Channel Types**:
   - Public channels: No authentication
   - Private channels: User authentication
   - Presence channels: User list

   ```javascript
   // Public channel
   Echo.channel('orders')
       .listen('OrderShipped', (e) => {
           console.log(e.order);
       });
   
   // Private channel
   Echo.private('orders.' + orderId)
       .listen('OrderUpdated', (e) => {
           console.log(e.order);
       });
   
   // Presence channel
   Echo.join('room.' + roomId)
       .here((users) => {
           console.log(users);
       })
       .joining((user) => {
           console.log(user.name + ' joined');
       })
       .leaving((user) => {
           console.log(user.name + ' left');
       });
   ```

3. **Event Listening**:
   - Listen for specific events
   - Handle event data
   - Multiple listeners per channel

   ```javascript
   // Multiple events on one channel
   Echo.private('chat.' + chatId)
       .listen('NewMessage', (e) => {
           addMessage(e.message);
       })
       .listen('MessageDeleted', (e) => {
           removeMessage(e.messageId);
       })
       .listen('UserTyping', (e) => {
           showTypingIndicator(e.user);
       });
   ```

4. **Client Events**:
   - Send events from client
   - User-to-user communication
   - Peer notifications

   ```javascript
   // Send client event (must be enabled in Pusher settings)
   Echo.private('chat.' + chatId)
       .whisper('typing', {
           user: currentUser
       });
   
   // Listen for whisper
   Echo.private('chat.' + chatId)
       .listenForWhisper('typing', (e) => {
           showTypingIndicator(e.user);
       });
   ```

5. **Notifications**:
   - Listen for user notifications
   - Broadcast notifications
   - Real-time alerts

   ```javascript
   // Listen for notifications
   Echo.private('App.Models.User.' + userId)
       .notification((notification) => {
           displayNotification(notification);
       });
   ```

### Laravel Dusk

Browser automation and testing:

1. **Installation and Setup**:
   - Install Dusk package
   - Configure environment
   - Set up ChromeDriver

   ```bash
   # Install Dusk
   composer require --dev laravel/dusk
   
   # Install Dusk scaffolding
   php artisan dusk:install
   ```

2. **Writing Browser Tests**:
   - Create test classes
   - Browser automation
   - Element selection and interaction

   ```php
   // Create a Dusk test
   php artisan dusk:make LoginTest
   
   // Example test
   public function testUserCanLogin()
   {
       $user = User::factory()->create([
           'email' => 'test@example.com',
           'password' => Hash::make('password'),
       ]);
       
       $this->browse(function (Browser $browser) {
           $browser->visit('/login')
                   ->type('email', 'test@example.com')
                   ->type('password', 'password')
                   ->press('Login')
                   ->assertPathIs('/dashboard')
                   ->assertSee('Welcome back');
       });
   }
   ```

3. **Multiple Browsers**:
   - Test user interactions
   - Synchronous events
   - Real-time features

   ```php
   public function testChatFeature()
   {
       $this->browse(function (Browser $first, Browser $second) {
           $first->loginAs(User::find(1))
                 ->visit('/chat/1')
                 ->waitFor('.chat-window');
                 
           $second->loginAs(User::find(2))
                  ->visit('/chat/1')
                  ->waitFor('.chat-window')
                  ->type('message', 'Hello there!')
                  ->press('Send');
                  
           $first->waitForText('Hello there!')
                 ->assertSee('Hello there!');
       });
   }
   ```

4. **Page Objects**:
   - Reusable page components
   - Encapsulate page logic
   - Maintainable tests

   ```php
   // Generate a page object
   php artisan dusk:page Dashboard
   
   // Page object implementation
   class Dashboard extends Page
   {
       public function url()
       {
           return '/dashboard';
       }
       
       public function assert(Browser $browser)
       {
           $browser->assertPathIs($this->url())
                   ->assertSee('Dashboard');
       }
       
       public function elements()
       {
           return [
               '@newPost' => 'button[data-action="new-post"]',
               '@userDropdown' => '.user-dropdown',
           ];
       }
       
       public function createNewPost(Browser $browser, $title, $content)
       {
           $browser->click('@newPost')
                   ->waitFor('#post-modal')
                   ->type('title', $title)
                   ->type('content', $content)
                   ->press('Submit');
       }
   }
   
   // Using the page object
   $this->browse(function (Browser $browser) {
       $browser->loginAs($user)
               ->visit(new Dashboard)
               ->createNewPost('Test Title', 'Test Content')
               ->assertSee('Post created successfully');
   });
   ```

5. **CI/CD Integration**:
   - Headless testing
   - Cross-browser testing
   - Screenshot and console capture

   ```php
   // Capture screenshots on failures
   $browser->screenshot('failure');
   
   // Store console logs
   $browser->storeConsoleLog('console');
   ```

### Package Development

Creating reusable Laravel packages:

1. **Package Structure**:
   - Composer configuration
   - Service providers
   - Directory organization

   ```
   my-package/
   ├── composer.json
   ├── README.md
   ├── LICENSE.md
   ├── config/
   │   └── my-package.php
   ├── src/
   │   ├── MyPackageServiceProvider.php
   │   ├── Facades/
   │   │   └── MyPackage.php
   │   ├── Models/
   │   ├── Commands/
   │   └── Services/
   │       └── MyService.php
   ├── database/
   │   └── migrations/
   ├── resources/
   │   ├── views/
   │   ├── js/
   │   └── css/
   ├── routes/
   │   └── web.php
   └── tests/
   ```

2. **Service Provider**:
   - Register package components
   - Publish resources
   - Load routes and views

   ```php
   class MyPackageServiceProvider extends ServiceProvider
   {
       public function register()
       {
           // Register container bindings
           $this->app->singleton('my-package', function ($app) {
               return new MyService();
           });
           
           // Merge config
           $this->mergeConfigFrom(
               __DIR__.'/../config/my-package.php', 'my-package'
           );
       }
       
       public function boot()
       {
           // Publish config
           $this->publishes([
               __DIR__.'/../config/my-package.php' => config_path('my-package.php'),
           ], 'config');
           
           // Publish migrations
           $this->publishes([
               __DIR__.'/../database/migrations/' => database_path('migrations'),
           ], 'migrations');
           
           // Publish assets
           $this->publishes([
               __DIR__.'/../resources/js' => public_path('vendor/my-package/js'),
               __DIR__.'/../resources/css' => public_path('vendor/my-package/css'),
           ], 'assets');
           
           // Load views
           $this->loadViewsFrom(__DIR__.'/../resources/views', 'my-package');
           
           // Load routes
           $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
           
           // Load migrations
           $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
           
           // Register commands
           if ($this->app->runningInConsole()) {
               $this->commands([
                   \MyVendor\MyPackage\Commands\MyCommand::class,
               ]);
           }
       }
   }
   ```

3. **Facades**:
   - Create package facades
   - Register in service provider
   - Simplify package API

   ```php
   // Facade class
   namespace MyVendor\MyPackage\Facades;
   
   use Illuminate\Support\Facades\Facade;
   
   class MyPackage extends Facade
   {
       protected static function getFacadeAccessor()
       {
           return 'my-package';
       }
   }
   
   // Register in service provider
   protected $facades = [
       'MyPackage' => 'MyVendor\\MyPackage\\Facades\\MyPackage',
   ];
   
   public function register()
   {
       // Register facades
       foreach ($this->facades as $alias => $facade) {
           $this->app->booting(function () use ($alias, $facade) {
               $loader = \Illuminate\Foundation\AliasLoader::getInstance();
               $loader->alias($alias, $facade);
           });
       }
       
       // Other registrations
   }
   ```

4. **Testing Packages**:
   - Set up test environment
   - Orchestra Testbench
   - Test service provider

   ```php
   // composer.json for development
   "require-dev": {
       "orchestra/testbench": "^6.0",
       "phpunit/phpunit": "^9.0"
   }
   
   // TestCase setup
   namespace MyVendor\MyPackage\Tests;
   
   use Orchestra\Testbench\TestCase as Orchestra;
   
   class TestCase extends Orchestra
   {
       protected function getPackageProviders($app)
       {
           return [
               'MyVendor\\MyPackage\\MyPackageServiceProvider',
           ];
       }
       
       protected function getPackageAliases($app)
       {
           return [
               'MyPackage' => 'MyVendor\\MyPackage\\Facades\\MyPackage',
           ];
       }
       
       protected function getEnvironmentSetUp($app)
       {
           // Setup default database for testing
           $app['config']->set('database.default', 'testing');
           $app['config']->set('database.connections.testing', [
               'driver' => 'sqlite',
               'database' => ':memory:',
               'prefix' => '',
           ]);
           
           // Package specific configuration
           $app['config']->set('my-package.option', 'value');
       }
   }
   ```

5. **Publishing Packages**:
   - Composer configuration
   - Version management
   - Packagist registration

   ```json
   {
       "name": "myvendor/my-package",
       "description": "My awesome Laravel package",
       "keywords": ["laravel", "package"],
       "license": "MIT",
       "authors": [
           {
               "name": "Your Name",
               "email": "your.email@example.com"
           }
       ],
       "require": {
           "php": "^7.4|^8.0",
           "illuminate/support": "^8.0|^9.0"
       },
       "require-dev": {
           "orchestra/testbench": "^6.0|^7.0",
           "phpunit/phpunit": "^9.0|^10.0"
       },
       "autoload": {
           "psr-4": {
               "MyVendor\\MyPackage\\": "src/"
           }
       },
       "autoload-dev": {
           "psr-4": {
               "MyVendor\\MyPackage\\Tests\\": "tests/"
           }
       },
       "extra": {
           "laravel": {
               "providers": [
                   "MyVendor\\MyPackage\\MyPackageServiceProvider"
               ],
               "aliases": {
                   "MyPackage": "MyVendor\\MyPackage\\Facades\\MyPackage"
               }
           }
       },
       "minimum-stability": "dev",
       "prefer-stable": true
   }
   ```

## Design Patterns in Laravel

### Repository Pattern

Separating data access logic:

1. **Basic Structure**:
   - Repository interface
   - Implementation class
   - Service provider binding

   ```php
   // Interface
   interface UserRepositoryInterface
   {
       public function all();
       public function find($id);
       public function create(array $data);
       public function update($id, array $data);
       public function delete($id);
   }
   
   // Implementation
   class EloquentUserRepository implements UserRepositoryInterface
   {
       protected $model;
       
       public function __construct(User $model)
       {
           $this->model = $model;
       }
       
       public function all()
       {
           return $this->model->all();
       }
       
       public function find($id)
       {
           return $this->model->findOrFail($id);
       }
       
       public function create(array $data)
       {
           return $this->model->create($data);
       }
       
       public function update($id, array $data)
       {
           $record = $this->find($id);
           $record->update($data);
           return $record;
       }
       
       public function delete($id)
       {
           return $this->model->destroy($id);
       }
   }
   ```

2. **Service Provider Registration**:
   - Bind interface to implementation
   - Configure in service providers

   ```php
   // In a service provider
   public function register()
   {
       $this->app->bind(
           UserRepositoryInterface::class,
           EloquentUserRepository::class
       );
   }
   ```

3. **Controller Usage**:
   - Inject repository interface
   - Decouple from data source
   - Easier to test

   ```php
   class UserController extends Controller
   {
       protected $users;
       
       public function __construct(UserRepositoryInterface $users)
       {
           $this->users = $users;
       }
       
       public function index()
       {
           $users = $this->users->all();
           return view('users.index', compact('users'));
       }
       
       public function show($id)
       {
           $user = $this->users->find($id);
           return view('users.show', compact('user'));
       }
   }
   ```

4. **Advanced Repository Methods**:
   - Query builder methods
   - Criteria pattern
   - Eager loading relationships

   ```php
   // Advanced repository methods
   interface UserRepositoryInterface
   {
       // Basic methods...
       
       public function findByEmail($email);
       public function paginate($perPage = 15);
       public function getActive();
       public function withPosts();
   }
   
   class EloquentUserRepository implements UserRepositoryInterface
   {
       // Basic methods...
       
       public function findByEmail($email)
       {
           return $this->model->where('email', $email)->first();
       }
       
       public function paginate($perPage = 15)
       {
           return $this->model->paginate($perPage);
       }
       
       public function getActive()
       {
           return $this->model->where('active', true)->get();
       }
       
       public function withPosts()
       {
           return $this->model->with('posts')->get();
       }
   }
   ```

5. **Testing with Repositories**:
   - Mock the repository interface
   - Test controllers in isolation
   - Fake repository implementations

   ```php
   public function testIndexAction()
   {
       // Create mock
       $repository = $this->mock(UserRepositoryInterface::class);
       
       // Set expectations
       $repository->shouldReceive('all')
           ->once()
           ->andReturn(collect([new User(['name' => 'John'])]));
       
       // Call the controller
       $response = $this->get('/users');
       
       // Assert the response
       $response->assertOk()
           ->assertSee('John');
   }
   ```

### Service Layer

Organizing business logic in service classes:

1. **Basic Service Structure**:
   - Service class with dependencies
   - Encapsulate business logic
   - Coordinate multiple repositories

   ```php
   class UserService
   {
       protected $users;
       protected $posts;
       protected $mailer;
       
       public function __construct(
           UserRepositoryInterface $users,
           PostRepositoryInterface $posts,
           Mailer $mailer
       ) {
           $this->users = $users;
           $this->posts = $posts;
           $this->mailer = $mailer;
       }
       
       public function createUser(array $data)
       {
           // Business logic
           $user = $this->users->create($data);
           
           // Send welcome email
           $this->mailer->send('emails.welcome', ['user' => $user], function ($m) use ($user) {
               $m->to($user->email)->subject('Welcome to our site!');
           });
           
           return $user;
       }
       
       public function deactivateUser($id)
       {
           $user = $this->users->find($id);
           
           // Archive user's posts
           $posts = $this->posts->findByUser($id);
           foreach ($posts as $post) {
               $this->posts->archive($post->id);
           }
           
           // Deactivate user
           $this->users->update($id, ['active' => false]);
           
           // Send notification
           $this->mailer->send('emails.account_deactivated', ['user' => $user], function ($m) use ($user) {
               $m->to($user->email)->subject('Account Deactivated');
           });
           
           return true;
       }
   }
   ```

2. **Controller Integration**:
   - Inject service classes
   - Thin controllers
   - Focus on HTTP concerns

   ```php
   class UserController extends Controller
   {
       protected $userService;
       
       public function __construct(UserService $userService)
       {
           $this->userService = $userService;
       }
       
       public function store(Request $request)
       {
           $validated = $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:8|confirmed',
           ]);
           
           $user = $this->userService->createUser($validated);
           
           return redirect()->route('users.show', $user)
               ->with('status', 'User created successfully!');
       }
       
       public function destroy($id)
       {
           $this->userService->deactivateUser($id);
           
           return redirect()->route('users.index')
               ->with('status', 'User deactivated successfully!');
       }
   }
   ```

3. **Transaction Management**:
   - Wrap operations in transactions
   - Ensure data consistency
   - Handle failures properly

   ```php
   public function transferFunds($fromAccountId, $toAccountId, $amount)
   {
       return DB::transaction(function () use ($fromAccountId, $toAccountId, $amount) {
           $fromAccount = $this->accounts->find($fromAccountId);
           $toAccount = $this->accounts->find($toAccountId);
           
           if ($fromAccount->balance < $amount) {
               throw new InsufficientFundsException('Insufficient funds');
           }
           
           // Update accounts
           $this->accounts->update($fromAccountId, [
               'balance' => $fromAccount->balance - $amount
           ]);
           
           $this->accounts->update($toAccountId, [
               'balance' => $toAccount->balance + $amount
           ]);
           
           // Log transaction
           $this->transactionLogger->log($fromAccountId, $toAccountId, $amount);
           
           return true;
       });
   }
   ```

4. **Event Dispatching**:
   - Publish domain events
   - Loose coupling
   - Background processing

   ```php
   public function registerUser(array $data)
   {
       $user = $this->users->create($data);
       
       // Dispatch events
       event(new UserRegistered($user));
       
       return $user;
   }
   
   // Event listener
   class SendWelcomeEmail
   {
       public function handle(UserRegistered $event)
       {
           // Send email
       }
   }
   ```

5. **Service Testing**:
   - Unit test business logic
   - Mock dependencies
   - Test each use case

   ```php
   public function testCreateUser()
   {
       // Mock dependencies
       $userRepo = $this->mock(UserRepositoryInterface::class);
       $postRepo = $this->mock(PostRepositoryInterface::class);
       $mailer = $this->mock(Mailer::class);
       
       // Set expectations
       $userRepo->shouldReceive('create')
           ->once()
           ->with(['name' => 'John', 'email' => 'john@example.com'])
           ->andReturn(new User(['id' => 1, 'name' => 'John', 'email' => 'john@example.com']));
       
       $mailer->shouldReceive('send')
           ->once();
       
       // Create service with mocked dependencies
       $service = new UserService($userRepo, $postRepo, $mailer);
       
       // Test method
       $user = $service->createUser(['name' => 'John', 'email' => 'john@example.com']);
       
       // Assert result
       $this->assertEquals('John', $user->name);
   }
   ```

### Factory Pattern

Creating objects without specifying the exact class:

1. **Basic Factory**:
   - Create objects based on input parameters
   - Hide complex instantiation logic
   - Centralize object creation

   ```php
   class PaymentGatewayFactory
   {
       public function make($type)
       {
           switch ($type) {
               case 'stripe':
                   return new StripeGateway(config('services.stripe.key'));
               case 'paypal':
                   return new PayPalGateway(
                       config('services.paypal.client_id'),
                       config('services.paypal.secret')
                   );
               case 'braintree':
                   return new BraintreeGateway(
                       config('services.braintree.environment'),
                       config('services.braintree.merchant_id')
                   );
               default:
                   throw new InvalidArgumentException("Unsupported payment gateway: {$type}");
           }
       }
   }
   
   // Usage
   $factory = new PaymentGatewayFactory();
   $gateway = $factory->make('stripe');
   $gateway->processPayment($amount);
   ```

2. **Laravel Integration**:
   - Binding factories in service container
   - Automatic resolution
   - Configuration-driven factories

   ```php
   // In service provider
   public function register()
   {
       $this->app->bind(PaymentGatewayInterface::class, function ($app) {
           $factory = new PaymentGatewayFactory();
           return $factory->make(config('services.payment.default'));
       });
   }
   
   // Usage in controller
   public function processPayment(Request $request, PaymentGatewayInterface $gateway)
   {
       return $gateway->processPayment($request->amount);
   }
   ```

3. **Factory Method Pattern**:
   - Abstract factory class
   - Concrete factory implementations
   - Consistent creation interface

   ```php
   abstract class ReportFactory
   {
       abstract public function createReport(): Report;
       
       public function generateReport()
       {
           $report = $this->createReport();
           $report->generate();
           return $report;
       }
   }
   
   class PDFReportFactory extends ReportFactory
   {
       public function createReport(): Report
       {
           return new PDFReport();
       }
   }
   
   class CSVReportFactory extends ReportFactory
   {
       public function createReport(): Report
       {
           return new CSVReport();
       }
   }
   ```

4. **Abstract Factory Pattern**:
   - Family of related factories
   - Create related objects
   - Ensure compatibility between components

   ```php
   interface UIFactory
   {
       public function createButton();
       public function createInput();
       public function createTable();
   }
   
   class BootstrapUIFactory implements UIFactory
   {
       public function createButton()
       {
           return new BootstrapButton();
       }
       
       public function createInput()
       {
           return new BootstrapInput();
       }
       
       public function createTable()
       {
           return new BootstrapTable();
       }
   }
   
   class TailwindUIFactory implements UIFactory
   {
       public function createButton()
       {
           return new TailwindButton();
       }
       
       public function createInput()
       {
           return new TailwindInput();
       }
       
       public function createTable()
       {
           return new TailwindTable();
       }
   }
   ```

5. **Factory with Laravel's Container**:
   - Using container to resolve dependencies
   - Dynamic factory resolution
   - Configuration-based instantiation

   ```php
   // Factory using container
   class ReportFactory
   {
       protected $app;
       
       public function __construct($app)
       {
           $this->app = $app;
       }
       
       public function make($type)
       {
           $class = config("reports.types.{$type}");
           
           if (!$class) {
               throw new InvalidArgumentException("Unknown report type: {$type}");
           }
           
           return $this->app->make($class);
       }
   }
   
   // Register in container
   $this->app->singleton('report.factory', function ($app) {
       return new ReportFactory($app);
   });
   
   // Usage
   $reportFactory = app('report.factory');
   $report = $reportFactory->make('sales');
   ```

### Strategy Pattern

Defining a family of algorithms and making them interchangeable:

1. **Basic Implementation**:
   - Interface defining strategy
   - Multiple strategy implementations
   - Context using strategies

   ```php
   // Strategy interface
   interface PaymentStrategy
   {
       public function pay($amount);
   }
   
   // Concrete strategies
   class CreditCardStrategy implements PaymentStrategy
   {
       private $cardNumber;
       private $cvv;
       
       public function __construct($cardNumber, $cvv)
       {
           $this->cardNumber = $cardNumber;
           $this->cvv = $cvv;
       }
       
       public function pay($amount)
       {
           // Credit card payment logic
           return "Paid $amount using credit card";
       }
   }
   
   class PayPalStrategy implements PaymentStrategy
   {
       private $email;
       
       public function __construct($email)
       {
           $this->email = $email;
       }
       
       public function pay($amount)
       {
           // PayPal payment logic
           return "Paid $amount using PayPal";
       }
   }
   
   // Context
   class PaymentProcessor
   {
       private $strategy;
       
       public function setStrategy(PaymentStrategy $strategy)
       {
           $this->strategy = $strategy;
       }
       
       public function processPayment($amount)
       {
           return $this->strategy->pay($amount);
       }
   }
   ```

2. **Laravel Implementation**:
   - Bind interfaces to strategies
   - Resolve strategies from container
   - Configure default strategies

   ```php
   // Service provider registration
   public function register()
   {
       $this->app->bind(PaymentStrategy::class, function ($app) {
           $default = config('payment.default');
           
           switch ($default) {
               case 'credit_card':
                   return new CreditCardStrategy(
                       config('payment.credit_card.number'),
                       config('payment.credit_card.cvv')
                   );
               case 'paypal':
                   return new PayPalStrategy(
                       config('payment.paypal.email')
                   );
               default:
                   throw new InvalidArgumentException("Unknown payment strategy: {$default}");
           }
       });
   }
   ```

3. **Runtime Strategy Selection**:
   - Change strategies at runtime
   - Client code decides strategy
   - Flexible behavior

   ```php
   class CheckoutController extends Controller
   {
       private $paymentProcessor;
       
       public function __construct(PaymentProcessor $paymentProcessor)
       {
           $this->paymentProcessor = $paymentProcessor;
       }
       
       public function checkout(Request $request)
       {
           $amount = $request->amount;
           
           if ($request->payment_method === 'credit_card') {
               $strategy = new CreditCardStrategy(
                   $request->card_number,
                   $request->cvv
               );
           } else {
               $strategy = new PayPalStrategy($request->email);
           }
           
           $this->paymentProcessor->setStrategy($strategy);
           $result = $this->paymentProcessor->processPayment($amount);
           
           return redirect()->route('thank_you')->with('message', $result);
       }
   }
   ```

4. **Real-World Examples**:
   - Payment processing (different gateways)
   - Shipping methods (different carriers)
   - Authentication methods (different providers)
   - Export formats (PDF, CSV, Excel)

   ```php
   // Shipping strategy example
   interface ShippingStrategy
   {
       public function calculate($order);
       public function getEstimatedDelivery();
   }
   
   class FedExStrategy implements ShippingStrategy
   {
       public function calculate($order)
       {
           // FedEx-specific calculation
       }
       
       public function getEstimatedDelivery()
       {
           return '2-3 business days';
       }
   }
   
   class UPSStrategy implements ShippingStrategy
   {
       public function calculate($order)
       {
           // UPS-specific calculation
       }
       
       public function getEstimatedDelivery()
       {
           return '3-5 business days';
       }
   }
   ```

5. **Benefits in Laravel**:
   - Easy to extend with new strategies
   - Testable with mock strategies
   - Clean separation of concerns
   - Configuration-driven behavior

### Observer Pattern

Implementing the observer pattern for event handling:

1. **Basic Implementation**:
   - Subject (observable) class
   - Observer interface
   - Registration and notification mechanism

   ```php
   // Observer interface
   interface Observer
   {
       public function update($subject);
   }
   
   // Subject class
   class Subject
   {
       protected $observers = [];
       protected $state;
       
       public function attach(Observer $observer)
       {
           $this->observers[] = $observer;
       }
       
       public function detach(Observer $observer)
       {
           $key = array_search($observer, $this->observers, true);
           if ($key !== false) {
               unset($this->observers[$key]);
           }
       }
       
       public function notify()
       {
           foreach ($this->observers as $observer) {
               $observer->update($this);
           }
       }
       
       public function setState($state)
       {
           $this->state = $state;
           $this->notify();
       }
       
       public function getState()
       {
           return $this->state;
       }
   }
   
   // Concrete observer
   class ConcreteObserver implements Observer
   {
       public function update($subject)
       {
           echo "State updated to: " . $subject->getState();
       }
   }
   ```

2. **Laravel Model Observers**:
   - Register in service provider
   - Handle model lifecycle events
   - Clean separation of event handling

   ```php
   // Create observer
   php artisan make:observer UserObserver --model=User
   
   // UserObserver.php
   class UserObserver
   {
       public function created(User $user)
       {
           // Handle after user creation
       }
       
       public function updated(User $user)
       {
           // Handle after user update
       }
       
       public function deleted(User $user)
       {
           // Handle after user deletion
       }
       
       public function restored(User $user)
       {
           // Handle after user restoration (from soft delete)
       }
       
       public function forceDeleted(User $user)
       {
           // Handle after user force deletion
       }
   }
   
   // Register in AppServiceProvider
   public function boot()
   {
       User::observe(UserObserver::class);
   }
   ```

3. **Event-Driven Architecture**:
   - Laravel events as subjects
   - Event listeners as observers
   - Laravel event broadcasting

   ```php
   // Create event
   php artisan make:event OrderShipped
   
   // Create listener
   php artisan make:listener SendShipmentNotification --event=OrderShipped
   
   // Event registration in EventServiceProvider
   protected $listen = [
       OrderShipped::class => [
           SendShipmentNotification::class,
           UpdateInventory::class,
           NotifyAdministrator::class,
       ],
   ];
   ```

4. **Custom Observable Trait**:
   - Implement custom observable pattern
   - Flexible event naming
   - Additional functionality

   ```php
   trait Observable
   {
       protected $observers = [];
       
       public function registerObserver($event, $callback)
       {
           if (!isset($this->observers[$event])) {
               $this->observers[$event] = [];
           }
           
           $this->observers[$event][] = $callback;
           
           return $this;
       }
       
       public function notifyObservers($event, $data = null)
       {
           if (!isset($this->observers[$event])) {
               return;
           }
           
           foreach ($this->observers[$event] as $callback) {
               call_user_func($callback, $data);
           }
       }
   }
   
   // Usage
   class Order
   {
       use Observable;
       
       public function ship()
       {
           // Shipping logic
           
           $this->notifyObservers('shipped', $this);
       }
   }
   
   // Register observer
   $order->registerObserver('shipped', function ($order) {
       // Send notification
   });
   ```

5. **Benefits in Laravel**:
   - Loose coupling between components
   - Separation of business logic from side effects
   - Easy to add new observers without changing core code
   - Testable with mock observers

### Decorator Pattern

Attaching additional responsibilities to objects dynamically:

1. **Basic Implementation**:
   - Component interface
   - Concrete component
   - Decorator abstract class
   - Concrete decorators

   ```php
   // Component interface
   interface Report
   {
       public function generate();
   }
   
   // Concrete component
   class BasicReport implements Report
   {
       public function generate()
       {
           return "Basic report data";
       }
   }
   
   // Decorator abstract class
   abstract class ReportDecorator implements Report
   {
       protected $report;
       
       public function __construct(Report $report)
       {
           $this->report = $report;
       }
       
       public function generate()
       {
           return $this->report->generate();
       }
   }
   
   // Concrete decorators
   class HeaderDecorator extends ReportDecorator
   {
       public function generate()
       {
           return "Report Header\n" . parent::generate();
       }
   }
   
   class FooterDecorator extends ReportDecorator
   {
       public function generate()
       {
           return parent::generate() . "\nReport Footer";
       }
   }
   
   class DataFilterDecorator extends ReportDecorator
   {
       private $filter;
       
       public function __construct(Report $report, $filter)
       {
           parent::__construct($report);
           $this->filter = $filter;
       }
       
       public function generate()
       {
           $content = parent::generate();
           return $this->applyFilter($content);
       }
       
       private function applyFilter($content)
       {
           // Apply filter to content
           return "Filtered: " . $content;
       }
   }
   ```

2. **Laravel Middleware as Decorators**:
   - Each middleware decorates the request/response
   - Chain of responsibility with decorators
   - Middleware pipeline

   ```php
   // Middleware as decorators
   class LogRequestMiddleware
   {
       public function handle($request, Closure $next)
       {
           // Pre-processing
           Log::info('Incoming request', ['url' => $request->url()]);
           
           $response = $next($request);
           
           // Post-processing
           Log::info('Outgoing response', ['status' => $response->status()]);
           
           return $response;
       }
   }
   ```

3. **Service Decorators**:
   - Decorate service implementations
   - Add caching, logging, validation
   - Maintain interface compatibility

   ```php
   // Original service
   class DatabaseUserRepository implements UserRepositoryInterface
   {
       public function findById($id)
       {
           return User::find($id);
       }
   }
   
   // Decorator with caching
   class CachingUserRepository implements UserRepositoryInterface
   {
       private $repository;
       private $cache;
       
       public function __construct(UserRepositoryInterface $repository, Cache $cache)
       {
           $this->repository = $repository;
           $this->cache = $cache;
       }
       
       public function findById($id)
       {
           return $this->cache->remember('user.'.$id, 60, function () use ($id) {
               return $this->repository->findById($id);
           });
       }
   }
   
   // Decorator with logging
   class LoggingUserRepository implements UserRepositoryInterface
   {
       private $repository;
       private $logger;
       
       public function __construct(UserRepositoryInterface $repository, Logger $logger)
       {
           $this->repository = $repository;
           $this->logger = $logger;
       }
       
       public function findById($id)
       {
           $this->logger->info('Finding user by ID: '.$id);
           $result = $this->repository->findById($id);
           
           if ($result) {
               $this->logger->info('User found');
           } else {
               $this->logger->warning('User not found');
           }
           
           return $result;
       }
   }
   
   // Service provider registration
   public function register()
   {
       $this->app->singleton(UserRepositoryInterface::class, function ($app) {
           $repository = new DatabaseUserRepository();
           
           if (config('app.cache_enabled')) {
               $repository = new CachingUserRepository(
                   $repository,
                   $app->make('cache.store')
               );
           }
           
           if (config('app.debug')) {
               $repository = new LoggingUserRepository(
                   $repository,
                   $app->make('log')
               );
           }
           
           return $repository;
       });
   }
   ```

4. **View Composers as Decorators**:
   - Decorate views with additional data
   - Chain multiple composers
   - Keep controllers clean

   ```php
   class UserDataComposer
   {
       public function compose(View $view)
       {
           $view->with('users', User::all());
       }
   }
   
   class ActiveUserComposer
   {
       public function compose(View $view)
       {
           $view->with('activeUsers', User::where('active', true)->get());
       }
   }
   
   // Register in service provider
   public function boot()
   {
       View::composer('dashboard', UserDataComposer::class);
       View::composer('dashboard', ActiveUserComposer::class);
   }
   ```

5. **Benefits in Laravel**:
   - Open/closed principle (extend without modifying)
   - Single responsibility principle
   - Flexible combination of behaviors
   - Dynamic composition at runtime

## Security Best Practices

### CSRF Protection

Cross-Site Request Forgery protection in Laravel:

1. **CSRF Token Generation**:
   - Laravel automatically generates CSRF tokens
   - Stored in user's session
   - Included with forms and AJAX requests

   ```php
   // In Blade template
   <form method="POST" action="/profile">
       @csrf
       <!-- Form fields -->
       <button type="submit">Update</button>
   </form>
   
   // Manually including token
   <form method="POST" action="/profile">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <!-- Form fields -->
   </form>
   ```

2. **CSRF Middleware**:
   - Laravel's `VerifyCsrfToken` middleware
   - Automatically checks POST, PUT, DELETE requests
   - Part of web middleware group

   ```php
   // in App\Http\Kernel.php
   protected $middlewareGroups = [
       'web' => [
           // ...
           \App\Http\Middleware\VerifyCsrfToken::class,
           // ...
       ],
   ];
   ```

3. **Excluding URLs from CSRF Protection**:
   - Whitelist certain URLs
   - Useful for webhooks or third-party callbacks

   ```php
   // In App\Http\Middleware\VerifyCsrfToken.php
   protected $except = [
       'stripe/*',
       'webhooks/*',
       'api/*',
   ];
   ```

4. **CSRF with JavaScript/AJAX**:
   - Include CSRF token in AJAX headers
   - Axios configuration in Laravel

   ```javascript
   // Bootstrap.js
   window.axios = require('axios');
   window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
   
   // Add CSRF token to every request
   const token = document.head.querySelector('meta[name="csrf-token"]');
   
   if (token) {
       window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
   } else {
       console.error('CSRF token not found');
   }
   ```

5. **CSRF with SPA**:
   - Using Laravel Sanctum for SPA protection
   - Cookie-based authentication with CSRF protection

   ```php
   // In config/sanctum.php
   'stateful' => [
       'localhost',
       'localhost:8000',
       '127.0.0.1',
       '127.0.0.1:8000',
       // ...
   ],
   ```

6. **Testing with CSRF**:
   - Tests automatically disable CSRF
   - `withoutMiddleware` method for specific tests

   ```php
   // Testing without disabling CSRF
   public function testProfileUpdateWithCsrf()
   {
       $user = User::factory()->create();
       
       $response = $this->actingAs($user)
           ->post('/profile', [
               '_token' => csrf_token(),
               'name' => 'Updated Name',
           ]);
       
       $response->assertRedirect();
       $this->assertEquals('Updated Name', $user->fresh()->name);
   }
   
   // Disable CSRF for specific test
   public function testApiEndpoint()
   {
       $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
       
       $response = $this->post('/api/endpoint', ['data' => 'value']);
       
       $response->assertStatus(200);
   }
   ```

### XSS Prevention

Cross-Site Scripting (XSS) protection in Laravel:

1. **Automatic Escaping**:
   - Blade templates automatically escape output
   - Prevents script injection in rendered HTML

   ```php
   // Safe - content is escaped
   <div>{{ $userInput }}</div>
   
   // Unsafe - use only with trusted content
   <div>{!! $rawHtml !!}</div>
   ```

2. **Content Security Policy (CSP)**:
   - Restrict which resources can be loaded
   - Prevent inline scripts and styles
   - Define trusted sources

   ```php
   // Custom middleware
   class ContentSecurityPolicy
   {
       public function handle($request, Closure $next)
       {
           $response = $next($request);
           
           $response->headers->set(
               'Content-Security-Policy',
               "default-src 'self'; script-src 'self' https://trusted-cdn.com; style-src 'self' https://trusted-cdn.com; img-src 'self' data:;"
           );
           
           return $response;
       }
   }
   
   // Register in Kernel.php
   protected $middleware = [
       // ...
       \App\Http\Middleware\ContentSecurityPolicy::class,
   ];
   ```

3. **Sanitizing User Input**:
   - Use validation rules to restrict input
   - HTML Purifier for allowing limited HTML
   - Strip tags for plain text

   ```php
   // Validation for plain text
   $request->validate([
       'name' => 'required|string|max:255',
       'comment' => 'required|string',
   ]);
   
   // Using HTML Purifier for limited HTML
   use HTMLPurifier;
   use HTMLPurifier_Config;
   
   $config = HTMLPurifier_Config::createDefault();
   $config->set('HTML.Allowed', 'p,b,i,a[href],ul,ol,li');
   $purifier = new HTMLPurifier($config);
   $cleanHtml = $purifier->purify($request->input('content'));
   ```

4. **HTTP Headers**:
   - X-XSS-Protection header
   - X-Content-Type-Options: nosniff
   - Set in global middleware

   ```php
   // In App\Http\Middleware\TrustProxies.php or custom middleware
   public function handle($request, Closure $next)
   {
       $response = $next($request);
       
       $response->headers->set('X-XSS-Protection', '1; mode=block');
       $response->headers->set('X-Content-Type-Options', 'nosniff');
       
       return $response;
   }
   ```

5. **JavaScript Best Practices**:
   - Don't eval() user input
   - Don't use innerHTML with user content
   - Use textContent or innerText instead

   ```javascript
   // Unsafe
   element.innerHTML = userInput;
   
   // Safe
   element.textContent = userInput;
   
   // If using jQuery
   // Unsafe
   $element.html(userInput);
   
   // Safe
   $element.text(userInput);
   ```

6. **AJAX/API Security**:
   - Validate and sanitize all input server-side
   - Set proper Content-Type headers
   - JSON encode data to prevent injection

   ```php
   // Controller returning JSON
   public function getData(Request $request)
   {
       $data = $this->service->getSomeData();
       
       return response()->json([
           'data' => $data,
       ]);
   }
   ```

### SQL Injection Prevention

Protecting against SQL injection attacks:

1. **Using Query Builder and Eloquent**:
   - Parameterized queries by default
   - Automatic escaping of values
   - Safe from SQL injection

   ```php
   // Safe - Query Builder
   $users = DB::table('users')
       ->where('status', $request->status)
       ->get();
   
   // Safe - Eloquent
   $users = User::where('status', $request->status)->get();
   ```

2. **Avoiding Raw Queries**:
   - Don't build SQL strings with concatenation
   - Use parameter binding for raw queries
   - Validate and sanitize input data

   ```php
   // Dangerous - direct string interpolation
   $query = "SELECT * FROM users WHERE status = '$status'"; // DON'T DO THIS
   
   // Safe - parameter binding
   $results = DB::select('SELECT * FROM users WHERE status = ?', [$status]);
   
   // Safe - named parameters
   $results = DB::select('SELECT * FROM users WHERE status = :status', ['status' => $status]);
   ```

3. **Using Prepared Statements**:
   - Separate SQL logic from data
   - Database handles escaping
   - Protection against injection

   ```php
   // Using prepared statements with PDO directly
   $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
   $statement->execute(['email' => $email]);
   $user = $statement->fetch();
   ```

4. **Validation and Sanitization**:
   - Validate input types and formats
   - Restrict to expected values
   - Type cast when appropriate

   ```php
   // Validate before using in query
   $validated = $request->validate([
       'email' => 'required|email',
       'status' => 'required|in:active,inactive,pending',
       'limit' => 'nullable|integer|min:1|max:100',
   ]);
   
   $users = User::where('email', $validated['email'])
       ->where('status', $validated['status'])
       ->limit($validated['limit'] ?? 10)
       ->get();
   ```

5. **Using Database Transactions**:
   - Prevent partial operations
   - Rollback on failure
   - Maintain data integrity

   ```php
   DB::transaction(function () use ($request) {
       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
       ]);
       
       $user->profile()->create([
           'bio' => $request->bio,
       ]);
   });
   ```

6. **Limiting Database Privileges**:
   - Use different DB users for different operations
   - Restrict permissions to only what's needed
   - Separate read-only and write access

### Mass Assignment Protection

Preventing mass assignment vulnerabilities:

1. **Guarded and Fillable Attributes**:
   - Define `$fillable` or `$guarded` in models
   - Limit mass assignment to safe attributes
   - Protection against overwriting sensitive fields

   ```php
   // Using $fillable - whitelist approach
   class User extends Model
   {
       // Only these fields can be mass-assigned
       protected $fillable = [
           'name', 'email', 'password', 'settings',
       ];
   }
   
   // Using $guarded - blacklist approach
   class User extends Model
   {
       // These fields cannot be mass-assigned
       protected $guarded = [
           'id', 'is_admin', 'created_at', 'updated_at',
       ];
   }
   ```

2. **Form Requests for Validation**:
   - Use custom form requests
   - Validate before mass assignment
   - Only validated fields are used

   ```php
   class UserRequest extends FormRequest
   {
       public function rules()
       {
           return [
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:8|confirmed',
           ];
       }
   }
   
   // In controller
   public function store(UserRequest $request)
   {
       // Only validated fields are available
       $user = User::create($request->validated());
       
       return redirect()->route('users.show', $user);
   }
   ```

### File Upload Security

Securing file uploads in Laravel applications:

1. **Validation**:
   - Validate file MIME types
   - Restrict file size
   - Verify file extension

   ```php
   $request->validate([
       'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       'document' => 'required|file|mimes:pdf,doc,docx|max:10240',
   ]);
   ```

2. **Storage Location**:
   - Store uploads outside public directory
   - Use Laravel's Storage facade
   - Create symbolic links for public access

   ```php
   // Store in private location
   $path = $request->file('document')->store('documents');
   
   // Store with public visibility
   $path = $request->file('avatar')->store('avatars', 'public');
   
   // Create symbolic link
   php artisan storage:link
   ```

3. **File Name Sanitization**:
   - Generate random names
   - Avoid using user-provided filenames
   - Prevent path traversal attacks

   ```php
   // Generate unique name
   $filename = Str::random(40) . '.' . $request->file('avatar')->getClientOriginalExtension();
   
   // Store with custom name
   $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');
   ```

4. **Content Verification**:
   - Verify file contents match extension
   - Use packages like `league/mime-type-detection`
   - Process images with libraries to remove metadata/scripts

   ```php
   $file = $request->file('upload');
   
   // Check if file is what it claims to be
   $mime = $file->getMimeType();
   $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];
   
   if (!in_array($mime, $allowedMimes)) {
       return back()->with('error', 'Invalid file type');
   }
   ```

5. **Processing Uploaded Images**:
   - Use Intervention Image for manipulation
   - Resize and compress images
   - Strip EXIF data

   ```php
   use Intervention\Image\Facades\Image;
   
   $image = Image::make($request->file('avatar'));
   $image->resize(300, null, function ($constraint) {
       $constraint->aspectRatio();
       $constraint->upsize();
   });
   $image->save(storage_path('app/public/avatars/' . $filename));
   ```

### Authentication Security

Best practices for secure authentication:

1. **Password Hashing**:
   - Use Laravel's built-in hashing
   - Automatically uses bcrypt or Argon2
   - Never store plain-text passwords

   ```php
   // Hashing a password
   $hashedPassword = Hash::make($request->password);
   
   // Verifying a password
   if (Hash::check($request->password, $user->password)) {
       // Password is correct
   }
   ```

2. **Multi-Factor Authentication**:
   - Implement two-factor authentication
   - Use services like Authy or Google Authenticator
   - Laravel Fortify includes 2FA support

   ```php
   // In config/fortify.php
   'features' => [
       Features::twoFactorAuthentication([
           'confirmPassword' => true,
       ]),
   ],
   ```

3. **Login Throttling**:
   - Rate limit login attempts
   - Lock accounts after multiple failures
   - Laravel includes this with Fortify or can be custom implemented

   ```php
   // Using Laravel's built-in throttling
   protected function attemptLogin(Request $request)
   {
       return $this->limiter()->attempt(
           $request,
           $request->only('email', 'password'),
           function ($user) {
               $this->authenticated($user);
           }
       );
   }
   ```

4. **Password Policies**:
   - Enforce strong passwords
   - Regular password rotation
   - Custom validation rules

   ```php
   // Password validation
   $request->validate([
       'password' => [
           'required',
           'confirmed',
           'min:12',
           'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/',
           'not_pwned', // Requires laravel-pwned-passwords package
       ],
   ]);
   ```

5. **Secure Session Configuration**:
   - HTTPS-only cookies
   - Proper session timeouts
   - Secure same-site cookie policy

   ```php
   // In config/session.php
   'secure' => env('SESSION_SECURE_COOKIE', true),
   'http_only' => true,
   'same_site' => 'lax',
   ```

## Deployment & DevOps

### Deployment Strategies

Best practices for deploying Laravel applications:

1. **Zero-Downtime Deployment**:
   - Deploy to new directory then switch symlinks
   - Blue-green deployment methodology
   - Avoid disruption during deployments

   ```bash
   # Basic zero-downtime deployment script
   timestamp=$(date +%Y%m%d%H%M%S)
   release_dir="/var/www/releases/${timestamp}"
   
   # Clone or copy app to new directory
   git clone --depth 1 git@github.com:user/repo.git ${release_dir}
   
   cd ${release_dir}
   composer install --no-dev --optimize-autoloader
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   
   # Update symlink
   ln -nfs ${release_dir} /var/www/current
   
   # Restart services
   sudo systemctl reload php8.1-fpm
   sudo systemctl reload nginx
   ```

2. **Deployment Tools**:
   - Laravel Envoyer
   - Deployer PHP
   - Laravel Forge
   - GitHub Actions or GitLab CI

   ```yaml
   # Example GitHub Actions deployment workflow
   name: Deploy
   
   on:
     push:
       branches: [ main ]
   
   jobs:
     deploy:
       runs-on: ubuntu-latest
       steps:
         - uses: actions/checkout@v3
         
         - name: Setup PHP
           uses: shivammathur/setup-php@v2
           with:
             php-version: '8.1'
             
         - name: Deploy to server
           uses: deployphp/action@v1
           with:
             private-key: ${{ secrets.DEPLOY_KEY }}
             deployment-file: deploy.php
   ```

3. **Database Migrations**:
   - Use migrations for all database changes
   - Test migrations thoroughly before deployment
   - Consider using `--pretend` flag to preview changes

   ```bash
   # Test migrations without running them
   php artisan migrate --pretend
   
   # Run migrations in production safely
   php artisan migrate --force
   ```

4. **Rollback Strategies**:
   - Keep previous releases for quick rollback
   - Database migration rollbacks
   - Maintain backup points

   ```bash
   # Switch symlink to previous release
   ln -nfs /var/www/releases/previous_timestamp /var/www/current
   
   # Roll back database
   php artisan migrate:rollback
   ```

### Server Requirements

Essential server setup for Laravel applications:

1. **Web Server**:
   - Nginx (recommended) or Apache
   - PHP-FPM configuration
   - Proper permissions

   ```nginx
   # Nginx configuration example
   server {
       listen 80;
       server_name example.com;
       root /var/www/current/public;
   
       add_header X-Frame-Options "SAMEORIGIN";
       add_header X-Content-Type-Options "nosniff";
   
       index index.php;
   
       charset utf-8;
   
       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }
   
       location = /favicon.ico { access_log off; log_not_found off; }
       location = /robots.txt  { access_log off; log_not_found off; }
   
       error_page 404 /index.php;
   
       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }
   
       location ~ /\.(?!well-known).* {
           deny all;
       }
   }
   ```

2. **PHP Requirements**:
   - PHP 8.0+ (or version required by your Laravel)
   - Required PHP extensions
   - Proper php.ini settings

   ```
   # Required PHP extensions
   BCMath PHP Extension
   Ctype PHP Extension
   Fileinfo PHP Extension
   JSON PHP Extension
   Mbstring PHP Extension
   OpenSSL PHP Extension
   PDO PHP Extension
   Tokenizer PHP Extension
   XML PHP Extension
   ```

3. **Database Setup**:
   - MySQL, PostgreSQL, or SQLite
   - Separate database users for applications
   - Proper indexing and optimization

   ```sql
   -- Create database and user
   CREATE DATABASE laravel_app;
   CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'secure_password';
   GRANT ALL PRIVILEGES ON laravel_app.* TO 'laravel_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

4. **Redis Setup**:
   - For caching, sessions, queues
   - Proper security configuration
   - Memory limits and persistence settings

   ```bash
   # Install Redis
   sudo apt-get install redis-server
   
   # Secure Redis
   # In /etc/redis/redis.conf
   bind 127.0.0.1
   requirepass secure_password
   ```

### CI/CD Pipeline Setup

Continuous Integration and Deployment for Laravel:

1. **GitHub Actions**:
   - Run tests on pull requests
   - Automate code quality checks
   - Deploy on merge to main branch

   ```yaml
   # .github/workflows/laravel.yml
   name: Laravel CI/CD
   
   on:
     push:
       branches: [ main ]
     pull_request:
       branches: [ main ]
   
   jobs:
     laravel-tests:
       runs-on: ubuntu-latest
       
       services:
         mysql:
           image: mysql:8.0
           env:
             MYSQL_ROOT_PASSWORD: password
             MYSQL_DATABASE: testing
           ports:
             - 3306:3306
           options: --health-cmd="mysqladmin ping" --health-interval=10s --health-timeout=5s --health-retries=3
       
       steps:
         - uses: actions/checkout@v3
         
         - name: Setup PHP
           uses: shivammathur/setup-php@v2
           with:
             php-version: '8.1'
             extensions: mbstring, dom, fileinfo, mysql
             coverage: xdebug
         
         - name: Copy ENV file
           run: cp .env.example .env
         
         - name: Install Composer dependencies
           run: composer install --no-interaction --prefer-dist --optimize-autoloader
         
         - name: Generate key
           run: php artisan key:generate
         
         - name: Run migrations
           run: php artisan migrate --force
           env:
             DB_CONNECTION: mysql
             DB_HOST: 127.0.0.1
             DB_PORT: 3306
             DB_DATABASE: testing
             DB_USERNAME: root
             DB_PASSWORD: password
         
         - name: Run tests
           run: vendor/bin/phpunit
           
         - name: Deploy to production
           if: github.ref == 'refs/heads/main'
           # Deployment steps here
   ```

2. **GitLab CI/CD**:
   - Multi-stage pipeline
   - Test, build, and deploy stages
   - Environment-specific deployments

   ```yaml
   # .gitlab-ci.yml
   stages:
     - test
     - build
     - deploy
   
   variables:
     MYSQL_DATABASE: testing
     MYSQL_ROOT_PASSWORD: password
   
   test:
     stage: test
     image: php:8.1-fpm
     services:
       - mysql:8.0
     before_script:
       - apt-get update && apt-get install -y git zip unzip
       - docker-php-ext-install pdo_mysql
       - curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
       - composer install --no-interaction --prefer-dist --optimize-autoloader
       - cp .env.example .env
       - php artisan key:generate
       - php artisan migrate --force
     script:
       - vendor/bin/phpunit
   
   build:
     stage: build
     image: php:8.1-fpm
     script:
       - apt-get update && apt-get install -y git zip unzip
       - curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
       - composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
       - php artisan config:cache
       - php artisan route:cache
       - php artisan view:cache
     artifacts:
       paths:
         - vendor/
         - bootstrap/
         - storage/
         - public/
         - artisan
     only:
       - main
   
   deploy:
     stage: deploy
     image: alpine:latest
     before_script:
       - apk add --no-cache openssh-client
       - mkdir -p ~/.ssh
       - echo "$SSH_PRIVATE_KEY" > ~/.ssh/id_rsa
       - chmod 600 ~/.ssh/id_rsa
     script:
       - scp -r * user@server:/var/www/html/
       - ssh user@server "cd /var/www/html && php artisan migrate --force"
     only:
       - main
   ```

3. **Laravel Forge**:
   - Server provisioning and management
   - Automatic deployments from Git
   - SSL certificate management

4. **Docker Containerization**:
   - Docker and docker-compose for development
   - Kubernetes for production
   - Container orchestration

   ```yaml
   # docker-compose.yml
   version: '3'
   
   services:
     app:
       build:
         context: .
         dockerfile: Dockerfile
       image: laravel-app
       container_name: laravel-app
       restart: unless-stopped
       working_dir: /var/www
       volumes:
         - ./:/var/www
       networks:
         - laravel
   
     nginx:
       image: nginx:alpine
       container_name: laravel-nginx
       restart: unless-stopped
       ports:
         - "80:80"
       volumes:
         - ./:/var/www
         - ./docker/nginx/:/etc/nginx/conf.d/
       networks:
         - laravel
   
     mysql:
       image: mysql:8.0
       container_name: laravel-mysql
       restart: unless-stopped
       environment:
         MYSQL_DATABASE: laravel
         MYSQL_ROOT_PASSWORD: secret
       volumes:
         - dbdata:/var/lib/mysql
       networks:
         - laravel
   
   networks:
     laravel:
       driver: bridge
   
   volumes:
     dbdata:
       driver: local
   ```

### Environment Configuration

Managing configuration across different environments:

1. **Environment Files**:
   - `.env` for environment-specific variables
   - `.env.example` for documentation
   - `.env.testing` for test configuration

   ```
   # .env.example
   APP_NAME=Laravel
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://localhost
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
   
   CACHE_DRIVER=file
   QUEUE_CONNECTION=sync
   SESSION_DRIVER=file
   SESSION_LIFETIME=120
   ```

2. **Configuration Caching**:
   - Cache configurations in production
   - Clear cache during deployment
   - Avoid env() in config files

   ```bash
   # In production
   php artisan config:cache
   
   # During development
   php artisan config:clear
   ```

3. **Secret Management**:
   - Keep sensitive data out of version control
   - Use environment variables for secrets
   - Consider vault solutions for larger teams

4. **Environment-Specific Services**:
   - Different service configurations per environment
   - Local development vs. production settings
   - Testing environment configuration

   ```php
   // config/services.php
   'mailgun' => [
       'domain' => env('MAILGUN_DOMAIN'),
       'secret' => env('MAILGUN_SECRET'),
       'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
   ],
   
   'postmark' => [
       'token' => env('POSTMARK_TOKEN'),
   ],
   ```

### Monitoring and Logging

Tracking application health and activity:

1. **Application Logs**:
   - Configure log channels
   - Structured logging
   - Log rotation

   ```php
   // config/logging.php
   'channels' => [
       'stack' => [
           'driver' => 'stack',
           'channels' => ['single', 'slack'],
           'ignore_exceptions' => false,
       ],
       
       'single' => [
           'driver' => 'single',
           'path' => storage_path('logs/laravel.log'),
           'level' => env('LOG_LEVEL', 'debug'),
       ],
       
       'daily' => [
           'driver' => 'daily',
           'path' => storage_path('logs/laravel.log'),
           'level' => env('LOG_LEVEL', 'debug'),
           'days' => 14,
       ],
       
       'slack' => [
           'driver' => 'slack',
           'url' => env('LOG_SLACK_WEBHOOK_URL'),
           'username' => 'Laravel Log',
           'emoji' => ':boom:',
           'level' => env('LOG_LEVEL', 'critical'),
       ],
   ],
   ```

2. **Error Tracking**:
   - Sentry, Bugsnag, or Flare
   - Detailed exception monitoring
   - Notifications for critical errors

   ```php
   // Configure Sentry
   // config/sentry.php
   'dsn' => env('SENTRY_DSN'),
   'traces_sample_rate' => env('SENTRY_TRACES_SAMPLE_RATE', 0.1),
   
   // In app/Exceptions/Handler.php
   public function register()
   {
       $this->reportable(function (Throwable $e) {
           if (app()->bound('sentry')) {
               app('sentry')->captureException($e);
           }
       });
   }
   ```

3. **Performance Monitoring**:
   - New Relic, Datadog, or Laravel Telescope
   - Track response times
   - Monitor database queries

   ```php
   // Using Laravel Telescope
   // config/telescope.php
   'enabled' => env('TELESCOPE_ENABLED', true),
   'middleware' => [
       'web',
       Authorize::class,
   ],
   ```

4. **Server Monitoring**:
   - CPU, memory, and disk usage
   - Server load and response time
   - Tools like Prometheus, Grafana, or Laravel Forge

5. **Custom Metrics**:
   - Track business-specific metrics
   - User activity and feature usage
   - Custom monitoring solutions

   ```php
   // In a controller or service
   public function processOrder(Order $order)
   {
       $startTime = microtime(true);
       
       // Process order
       
       $duration = microtime(true) - $startTime;
       Log::info('Order processed', [
           'order_id' => $order->id,
           'duration' => $duration,
           'items_count' => $order->items->count(),
       ]);
   }
   ```

### Scaling Laravel Applications

Strategies for handling increased load:

1. **Database Optimization**:
   - Proper indexing
   - Query optimization
   - Database replication (read/write splitting)

   ```php
   // config/database.php
   'mysql' => [
       'read' => [
           'host' => [
               env('DB_HOST_READ', '192.168.1.1'),
           ],
       ],
       'write' => [
           'host' => [
               env('DB_HOST_WRITE', '192.168.1.2'),
           ],
       ],
       'sticky' => true,
       'driver' => 'mysql',
       // other options...
   ],
   ```

2. **Caching Strategies**:
   - Redis or Memcached
   - Cache database queries
   - Full page caching for static content

   ```php
   // Cache expensive queries
   $users = Cache::remember('all_active_users', 60*60, function () {
       return User::where('active', true)->with('profile')->get();
   });
   ```

3. **Queues for Background Processing**:
   - Offload time-consuming tasks
   - Process emails, reports in background
   - Horizontal scaling of queue workers

   ```php
   // Dispatch job to queue
   ProcessReport::dispatch($reportData)->onQueue('reports');
   
   // In supervisor config
   [program:laravel-worker-reports]
   process_name=%(program_name)s_%(process_num)02d
   command=php /var/www/artisan queue:work redis --queue=reports --sleep=3 --tries=3
   autostart=true
   autorestart=true
   numprocs=4
   ```

4. **Load Balancing**:
   - Multiple application servers
   - Nginx or HAProxy as load balancer
   - Session management across servers

   ```nginx
   # Load balancer configuration
   upstream laravel_servers {
       server 10.0.0.1;
       server 10.0.0.2;
       server 10.0.0.3;
   }
   
   server {
       listen 80;
       server_name example.com;
       
       location / {
           proxy_pass http://laravel_servers;
           proxy_set_header Host $host;
           proxy_set_header X-Real-IP $remote_addr;
       }
   }
   ```

5. **Content Delivery Network (CDN)**:
   - Offload static assets
   - Cloudflare, AWS CloudFront, etc.
   - Proper cache headers

   ```php
   // In AppServiceProvider
   public function boot()
   {
       if (app()->environment('production')) {
           URL::forceScheme('https');
           $this->app['url']->assetUrl = config('app.asset_url');
       }
   }
   ```

6. **Microservices Architecture**:
   - Break monolith into services
   - API gateways
   - Service discovery

## Laravel Ecosystem

### Laravel Nova

Admin panel for Laravel applications:

1. **Key Features**:
   - CRUD operations for Eloquent models
   - Customizable resource fields
   - Permission-based access control
   - Search, filters, and actions

2. **Resource Definition**:
   - Define how models appear in the admin panel
   - Customize fields and relationships
   - Control validation and display

   ```php
   namespace App\Nova;
   
   use Laravel\Nova\Fields\ID;
   use Laravel\Nova\Fields\Text;
   use Laravel\Nova\Fields\Textarea;
   use Laravel\Nova\Fields\BelongsTo;
   use Laravel\Nova\Fields\HasMany;
   
   class Post extends Resource
   {
       public static $model = \App\Models\Post::class;
       public static $title = 'title';
       public static $search = ['title', 'body'];
       
       public function fields(Request $request)
       {
           return [
               ID::make()->sortable(),
               
               Text::make('Title')
                   ->sortable()
                   ->rules('required', 'max:255'),
               
               Textarea::make('Body')
                   ->rules('required'),
               
               BelongsTo::make('Author', 'user', User::class),
               
               HasMany::make('Comments'),
           ];
       }
   }
   ```

3. **Custom Fields and Cards**:
   - Create custom Nova fields
   - Dashboard cards and metrics
   - Extend Nova's functionality

   ```php
   // Custom dashboard metric
   class NewUsers extends Value
   {
       public function calculate(Request $request)
       {
           return $this->count($request, User::class);
       }
       
       public function ranges()
       {
           return [
               'TODAY' => 'Today',
               30 => '30 Days',
               60 => '60 Days',
               365 => '365 Days',
               'MTD' => 'Month To Date',
               'QTD' => 'Quarter To Date',
               'YTD' => 'Year To Date',
           ];
       }
   }
   ```

### Laravel Vapor

Serverless deployment platform for Laravel:

1. **Serverless Architecture**:
   - AWS Lambda-based deployment
   - Auto-scaling applications
   - No server management

2. **Key Features**:
   - Zero-downtime deployments
   - Custom domains and SSL
   - Database and cache management
   - File storage integration with S3

3. **Vapor CLI**:
   - Deployment and management via CLI
   - Environment variable management
   - Secret storage and management

   ```bash
   # Initialize Vapor in your project
   vapor init
   
   # Deploy to environment
   vapor deploy production
   
   # Manage secrets
   vapor secret:set production DB_PASSWORD=secret
   ```

4. **Vapor.yml Configuration**:
   - Define environments and resources
   - Set up queues and schedules
   - Configure caching and databases

   ```yaml
   id: 12345
   name: my-app
   environments:
       production:
           memory: 1024
           cli-memory: 512
           runtime: php-8.1
           build:
               - 'composer install --no-dev'
               - 'php artisan event:cache'
               - 'npm ci && npm run build'
           deploy:
               - 'php artisan migrate --force'
           domain: example.com
           database: vapor-db
           cache: vapor-cache
           queues:
               - default
           scheduler: true
   ```

### Laravel Forge

Server management and deployment tool:

1. **Server Provisioning**:
   - One-click server creation
   - NGINX, MySQL, Redis setup
   - Server optimization for Laravel

2. **Deployment Features**:
   - Easy Git deployment
   - Zero-downtime deployments
   - Deployment script customization

   ```bash
   # Example Forge deployment script
   cd /home/forge/example.com
   git pull origin main
   composer install --no-interaction --prefer-dist --optimize-autoloader
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Server Management**:
   - SSL certificates via Let's Encrypt
   - Queue and schedule monitoring
   - Database backups and management

4. **Integration with Other Services**:
   - GitHub, GitLab, Bitbucket
   - Load balancers
   - Monitoring tools

### Laravel Envoyer

Zero-downtime deployment tool:

1. **Key Features**:
   - Zero-downtime deployments
   - Deployment hooks
   - Rollback capability

2. **Deployment Process**:
   - Clone repository to new release directory
   - Run deployment hooks
   - Atomic activation via symlinks

3. **Deployment Hooks**:
   - Customize deployment steps
   - Before/after deployment hooks
   - Health check integration

   ```php
   // deploy.php
   
   namespace Deployer;
   
   require 'recipe/laravel.php';
   
   set('application', 'my_app');
   set('repository', 'git@github.com:user/repo.git');
   set('git_tty', true);
   set('keep_releases', 5);
   
   host('example.com')
       ->user('forge')
       ->set('deploy_path', '/home/forge/example.com');
   
   task('artisan:optimize', function () {
       run('{{bin/php}} {{release_path}}/artisan optimize');
   });
   
   after('deploy:failed', 'deploy:unlock');
   after('deploy:symlink', 'artisan:optimize');
   ```

### Laravel Telescope

Debug assistant for Laravel applications:

1. **Key Features**:
   - Request monitoring
   - Database query logging
   - Cache operation tracking
   - Redis commands monitoring

2. **Installation and Configuration**:
   - Install via Composer
   - Register service provider
   - Configure access control

   ```bash
   composer require laravel/telescope --dev
   
   php artisan telescope:install
   php artisan migrate
   ```

3. **Watchers**:
   - Request watcher
   - Query watcher
   - Job watcher
   - Mail watcher
   - Custom watchers

   ```php
   // config/telescope.php
   'watchers' => [
       Watchers\CacheWatcher::class => true,
       Watchers\CommandWatcher::class => true,
       Watchers\DumpWatcher::class => true,
       Watchers\EventWatcher::class => true,
       Watchers\ExceptionWatcher::class => true,
       Watchers\JobWatcher::class => true,
       Watchers\LogWatcher::class => true,
       Watchers\MailWatcher::class => true,
       Watchers\ModelWatcher::class => true,
       Watchers\NotificationWatcher::class => true,
       Watchers\QueryWatcher::class => true,
       Watchers\RedisWatcher::class => true,
       Watchers\RequestWatcher::class => true,
       Watchers\ScheduleWatcher::class => true,
       Watchers\ViewWatcher::class => true,
   ],
   ```

4. **Production Use**:
   - Limiting data storage
   - Restricting access
   - Pruning old entries

   ```php
   // In TelescopeServiceProvider
   protected function gate()
   {
       Gate::define('viewTelescope', function ($user) {
           return in_array($user->email, [
               'admin@example.com',
           ]);
       });
   }
   
   // Prune old entries
   php artisan telescope:prune --hours=48
   ```

### Laravel Jetstream

Application scaffolding featuring login, registration, and more:

1. **Key Features**:
   - Authentication system
   - Two-factor authentication
   - Team management
   - Profile management
   - API token authentication

2. **Frontend Options**:
   - Livewire stack
   - Inertia.js stack
   - Vue.js or React components

   ```bash
   # Install with Livewire stack
   composer require laravel/jetstream
   php artisan jetstream:install livewire
   
   # Install with Inertia.js stack
   php artisan jetstream:install inertia
   
   # With team support
   php artisan jetstream:install livewire --teams
   ```

3. **Core Components**:
   - Authentication
   - Profile management
   - API management
   - Team management (optional)

4. **Customization**:
   - Custom views and templates
   - Feature flags
   - Extend core functionality

   ```php
   // config/jetstream.php
   'features' => [
       Features::profilePhotos(),
       Features::api(),
       Features::teams([
           'invitations' => true,
           'permissions' => [
               'create',
               'read',
               'update',
               'delete',
           ],
       ]),
       Features::accountDeletion(),
   ],
   ```

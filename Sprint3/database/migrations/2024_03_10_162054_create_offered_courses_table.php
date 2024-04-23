<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offered_courses', function (Blueprint $table) {
            $table->string('course_id', 50)->primary();
            $table->longText('description');
        });

        // Insert values into the table
        DB::table('offered_courses')->insert([
            ['course_id' => 'CSE110', 'description' => 'This course would be an introduction to the foundations of computation and purpose of mechanized computation. Emphasis will be placed on techniques of problem analysis and the development of algorithms and programs. Topics will include:
            1. Introduction to digital computers and programming algorithms and flow chart construction.
            2. Information representation in digital computers. Writing, debugging and running programs (including file handling) on various digital computers using an appropriate language.
            3. Data structures, abstraction, recursion, iteration, as well as the design and analysis of basic algorithms.'],

            ['course_id' => 'CSE111', 'description' => 'This course would be an introduction to data structures, formal specification of syntax, elements of language theory and mathematical preliminaries. Other topics that would be covered are formal languages, structured programming concepts, survey of features of existing high level languages. Students would design and write application using an appropriate language.
            The course includes a compulsory 3 hour laboratory work each week.
            (Pre req. CSE 110 )'],

            ['course_id' => 'CSE220', 'description' => 'Introduction to widely used and effective methods of data organisation, focusing on data structures, their algorithms and the performance of these algorithms. Concepts and examples, elementary data objects, elementary data structures, arrays, lists, stacks, queues, graphs, trees, compound structures, data abstraction and primitive operations on these structures. memory management; sorting and searching; hash techniques; Introduction to the fundamental algorithms and data structures: recursion, backtrack search, lists, stacks, queues, trees, operation on sets, priority queues, graph dictionary. Introduction to the analysis of algorithms to process the basic structures. A brief introduction to database systems and the analysis of data structure performance and use in these systems. The course includes a compulsory 3 hour laboratory work alternate week.'],

            ['course_id' => 'CSE221', 'description' => 'The study of efficient algorithms and effective algorithm design techniques. Techniques for analysis of algorithms, Methods for the design of efficient algorithms: Divide and Conquer paradigm, Greedy method, Dynamic programming, Backtracking, Basic search and traversal techniques, Graph algorithms, Elementary parallel algorithms, Algebraic simplification and transformations, Lower bound theory, NP-hard and NP-complete problems. Techniques for the design and analysis of efficient algorithms, Emphasising methods useful in practice. sorting; Data structures for sets: Heaps, Hashing; Graph algorithms: Shortest paths, Depth-first search, Network flow, Computational geometry; Integer arithmetic: gcd, primality; polynomial and matrix calculations; amortised analysis; Performance bounds, asymptotic and analysis, worst case and average case behaviour, correctness and complexity. Particular classes of algorithms such as sorting and searching are studied in detail. The course includes a compulsory 3 hour laboratory work alternate week. ( Pre req. CSE 220 )'],

            ['course_id' => 'CSE230', 'description' => 'Set theory, Elementary number theory, Graph theory, Paths and trees, Boolean Algebra, Binary Relations, Functions, Algebraic system, Generating functions, Induction, Reduction, Semigroup, Permutation groups, Discrete Probability, Mathematical logic, Prepositional calculus and Predicate calculus.'],

            ['course_id' => 'CSE250', 'description' => 'Fundamental electrical concepts and measuring units. Direct current: voltage, current, resistance and power. Laws of electrical circuits and methods of network analysis; Introduction to magnetic circuits. Alternating current: instantaneous and r.m.s. current, voltage and power, average power for various combinations of R, L and C circuits, phasor representation of sinusoidal quantities. The course includes a compulsory 3 hour laboratory work alternate week.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offered_courses');
    }
};

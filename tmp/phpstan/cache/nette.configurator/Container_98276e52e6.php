<?php

// source: phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar/conf/config.neon
// source: phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar/conf/config.levelmax.neon
// source: C:\laragon\www\work\panda\phpstan.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);
use Carbon\PHPStan\MacroExtension;
use Illuminate\Filesystem\Filesystem;
use Larastan\Larastan\ClosureTypes\RelationshipQueryCallbackExtension;
use Larastan\Larastan\Collectors\UsedEmailAlternativeSyntaxViewCollector;
use Larastan\Larastan\Collectors\UsedEmailSendViewCollector;
use Larastan\Larastan\Collectors\UsedEmailViewCollector;
use Larastan\Larastan\Collectors\UsedRouteFacadeViewCollector;
use Larastan\Larastan\Collectors\UsedTranslationFacadeCollector;
use Larastan\Larastan\Collectors\UsedTranslationFunctionCollector;
use Larastan\Larastan\Collectors\UsedTranslationTranslatorCollector;
use Larastan\Larastan\Collectors\UsedTranslationViewCollector;
use Larastan\Larastan\Collectors\UsedViewFacadeMakeCollector;
use Larastan\Larastan\Collectors\UsedViewFunctionCollector;
use Larastan\Larastan\Collectors\UsedViewInAnotherViewCollector;
use Larastan\Larastan\Collectors\UsedViewMakeCollector;
use Larastan\Larastan\Internal\ConfigHelper;
use Larastan\Larastan\Internal\ConsoleApplicationHelper;
use Larastan\Larastan\Internal\ConsoleApplicationResolver;
use Larastan\Larastan\LarastanStubFilesExtension;
use Larastan\Larastan\Methods\AuthsMethodsExtension;
use Larastan\Larastan\Methods\BuilderHelper;
use Larastan\Larastan\Methods\ContractsMethodsExtension;
use Larastan\Larastan\Methods\EloquentBuilderForwardsCallsExtension;
use Larastan\Larastan\Methods\FacadesMethodsExtension;
use Larastan\Larastan\Methods\HigherOrderCollectionProxyExtension;
use Larastan\Larastan\Methods\HigherOrderTapProxyExtension;
use Larastan\Larastan\Methods\MacroMethodsClassReflectionExtension;
use Larastan\Larastan\Methods\ManagersMethodsExtension;
use Larastan\Larastan\Methods\ModelFactoryMethodsClassReflectionExtension;
use Larastan\Larastan\Methods\ModelForwardsCallsExtension;
use Larastan\Larastan\Methods\RedirectResponseMethodsClassReflectionExtension;
use Larastan\Larastan\Methods\RelationForwardsCallsExtension;
use Larastan\Larastan\Methods\StorageMethodsClassReflectionExtension;
use Larastan\Larastan\Methods\ViewWithMethodsClassReflectionExtension;
use Larastan\Larastan\Properties\HigherOrderCollectionProxyPropertyExtension;
use Larastan\Larastan\Properties\MigrationCache;
use Larastan\Larastan\Properties\MigrationHelper;
use Larastan\Larastan\Properties\ModelAccessorExtension;
use Larastan\Larastan\Properties\ModelCastHelper;
use Larastan\Larastan\Properties\ModelPropertyExtension;
use Larastan\Larastan\Properties\ModelPropertyHelper;
use Larastan\Larastan\Properties\ModelRelationsExtension;
use Larastan\Larastan\Properties\Schema\MySqlDataTypeToPhpTypeConverter;
use Larastan\Larastan\Properties\SquashedMigrationHelper;
use Larastan\Larastan\ReturnTypes\AppEnvironmentReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\AppFacadeEnvironmentReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ApplicationMakeDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\AppMakeDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\AppMakeHelper;
use Larastan\Larastan\ReturnTypes\ArrGetDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\AuthExtension;
use Larastan\Larastan\ReturnTypes\AuthManagerExtension;
use Larastan\Larastan\ReturnTypes\CollectionFilterRejectDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\CollectionWhereNotNullDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConfigRepositoryDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConsoleCommand\ArgumentDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConsoleCommand\HasArgumentDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConsoleCommand\HasOptionDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ConsoleCommand\OptionDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ContainerArrayAccessDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ContainerMakeDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\DateExtension;
use Larastan\Larastan\ReturnTypes\DoubleUnderscoreHelperReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\EloquentBuilderExtension;
use Larastan\Larastan\ReturnTypes\EloquentCollectionMapDynamicReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\FactoryDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\FormRequestSafeDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\GuardDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\GuardExtension;
use Larastan\Larastan\ReturnTypes\Helpers\AppExtension;
use Larastan\Larastan\ReturnTypes\Helpers\CollectExtension;
use Larastan\Larastan\ReturnTypes\Helpers\ConfigFunctionDynamicFunctionReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\Helpers\EnvFunctionDynamicFunctionReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\Helpers\LiteralExtension;
use Larastan\Larastan\ReturnTypes\Helpers\NowAndTodayExtension;
use Larastan\Larastan\ReturnTypes\Helpers\ResponseExtension;
use Larastan\Larastan\ReturnTypes\Helpers\StrExtension;
use Larastan\Larastan\ReturnTypes\Helpers\TapExtension;
use Larastan\Larastan\ReturnTypes\Helpers\ValidatorExtension;
use Larastan\Larastan\ReturnTypes\Helpers\ValueExtension;
use Larastan\Larastan\ReturnTypes\LangGetReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ModelDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ModelFactoryDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ModelOnlyDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\ModelSerializationDynamicMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\RelationCollectionExtension;
use Larastan\Larastan\ReturnTypes\RequestFileExtension;
use Larastan\Larastan\ReturnTypes\RequestRouteExtension;
use Larastan\Larastan\ReturnTypes\RequestUserExtension;
use Larastan\Larastan\ReturnTypes\StorageDynamicStaticMethodReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\TestCaseExtension;
use Larastan\Larastan\ReturnTypes\TransHelperReturnTypeExtension;
use Larastan\Larastan\ReturnTypes\TranslatorGetReturnTypeExtension;
use Larastan\Larastan\Rules\ArrKeyExistenceRule;
use Larastan\Larastan\Rules\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule;
use Larastan\Larastan\Rules\ConfigCollectionRule;
use Larastan\Larastan\Rules\ConsoleCommand\UndefinedArgumentOrOptionRule;
use Larastan\Larastan\Rules\DeferrableServiceProviderMissingProvidesRule;
use Larastan\Larastan\Rules\ModelAppendsRule;
use Larastan\Larastan\Rules\ModelRelationDefaultsRule;
use Larastan\Larastan\Rules\ModelRuleHelper;
use Larastan\Larastan\Rules\NoAuthFacadeInRequestScopeRule;
use Larastan\Larastan\Rules\NoAuthHelperInRequestScopeRule;
use Larastan\Larastan\Rules\NoEnvCallsOutsideOfConfigRule;
use Larastan\Larastan\Rules\NoImplicitQueryBuilderCallRule;
use Larastan\Larastan\Rules\NoMissingTranslationsRule;
use Larastan\Larastan\Rules\NoModelMakeRule;
use Larastan\Larastan\Rules\NoPublicModelScopeAndAccessorRule;
use Larastan\Larastan\Rules\NoUnnecessaryCollectionCallRule;
use Larastan\Larastan\Rules\NoUnnecessaryEnumerableToArrayCallsRule;
use Larastan\Larastan\Rules\OctaneCompatibilityRule;
use Larastan\Larastan\Rules\Queue\BatchableJobChecksCancellationRule;
use Larastan\Larastan\Rules\Queue\BatchedJobIsBatchableRule;
use Larastan\Larastan\Rules\Queue\JobDispatchedInTransactionUsesAfterCommitRule;
use Larastan\Larastan\Rules\Queue\JobWithModelPropertyDeclaresSerializesModelsRule;
use Larastan\Larastan\Rules\Queue\NoBatchedUniqueJobRule;
use Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueForRule;
use Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueIdRule;
use Larastan\Larastan\Rules\RelationExistenceHelper;
use Larastan\Larastan\Rules\RelationExistenceRule;
use Larastan\Larastan\Rules\UnusedViewsRule;
use Larastan\Larastan\Rules\UselessConstructs\NoUselessValueFunctionCallsRule;
use Larastan\Larastan\Rules\UselessConstructs\NoUselessWithFunctionCallsRule;
use Larastan\Larastan\SQL\IamcalSqlParser;
use Larastan\Larastan\SQL\SqlParser;
use Larastan\Larastan\SQL\SqlParserFactory;
use Larastan\Larastan\Support\CallArgumentsHelper;
use Larastan\Larastan\Support\CollectionHelper;
use Larastan\Larastan\Support\ConfigParser;
use Larastan\Larastan\Support\HigherOrderCollectionProxyHelper;
use Larastan\Larastan\Support\ViewFileHelper;
use Larastan\Larastan\Support\ViewParser;
use Larastan\Larastan\Types\AbortIfFunctionTypeSpecifyingExtension;
use Larastan\Larastan\Types\ArrPullParameterOutTypeExtension;
use Larastan\Larastan\Types\BuilderOf\BuilderOfTypeNodeResolverExtension;
use Larastan\Larastan\Types\CollectionOf\CollectionOfTypeNodeResolverExtension;
use Larastan\Larastan\Types\GenericEloquentBuilderTypeNodeResolverExtension;
use Larastan\Larastan\Types\GenericEloquentCollectionTypeNodeResolverExtension;
use Larastan\Larastan\Types\ModelProperty\ModelPropertyTypeNodeResolverExtension;
use Larastan\Larastan\Types\RelationOf\RelationOfTypeNodeResolverExtension;
use Larastan\Larastan\Types\ViewStringTypeNodeResolverExtension;
use PhpParser\BuilderFactory;
use PhpParser\Lexer;
use PhpParser\Lexer\Emulative;
use PhpParser\Node\Expr;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\Parser\Php8;
use PhpParser\ParserAbstract;
use PHPStan\Analyser\Analyser;
use PHPStan\Analyser\AnalyserResultFinalizer;
use PHPStan\Analyser\ArgsResult;
use PHPStan\Analyser\ArgumentsHandler;
use PHPStan\Analyser\AttributesHandler;
use PHPStan\Analyser\CalledMethodProcessor;
use PHPStan\Analyser\ClosureProcessor;
use PHPStan\Analyser\ConstantResolver;
use PHPStan\Analyser\ConstantResolverFactory;
use PHPStan\Analyser\DeclarationDependencyTracker;
use PHPStan\Analyser\DeprecatedAttributeResolver;
use PHPStan\Analyser\ExpressionResult;
use PHPStan\Analyser\ExpressionResultFactory;
use PHPStan\Analyser\ExprHandler\ArrayDimFetchHandler;
use PHPStan\Analyser\ExprHandler\ArrayHandler;
use PHPStan\Analyser\ExprHandler\ArrowFunctionHandler;
use PHPStan\Analyser\ExprHandler\AssignHandler;
use PHPStan\Analyser\ExprHandler\AssignOpHandler;
use PHPStan\Analyser\ExprHandler\BinaryOpHandler;
use PHPStan\Analyser\ExprHandler\BitwiseNotHandler;
use PHPStan\Analyser\ExprHandler\BooleanAndHandler;
use PHPStan\Analyser\ExprHandler\BooleanNotHandler;
use PHPStan\Analyser\ExprHandler\BooleanOrHandler;
use PHPStan\Analyser\ExprHandler\CastHandler;
use PHPStan\Analyser\ExprHandler\CastStringHandler;
use PHPStan\Analyser\ExprHandler\ClassConstFetchHandler;
use PHPStan\Analyser\ExprHandler\CloneHandler;
use PHPStan\Analyser\ExprHandler\ClosureHandler;
use PHPStan\Analyser\ExprHandler\CoalesceHandler;
use PHPStan\Analyser\ExprHandler\ConstFetchHandler;
use PHPStan\Analyser\ExprHandler\EmptyHandler;
use PHPStan\Analyser\ExprHandler\ErrorSuppressHandler;
use PHPStan\Analyser\ExprHandler\EvalHandler;
use PHPStan\Analyser\ExprHandler\ExitHandler;
use PHPStan\Analyser\ExprHandler\FuncCallHandler;
use PHPStan\Analyser\ExprHandler\Helper\BooleanNarrowingHelper;
use PHPStan\Analyser\ExprHandler\Helper\ClosureParameterResolver;
use PHPStan\Analyser\ExprHandler\Helper\ClosureTypeResolver;
use PHPStan\Analyser\ExprHandler\Helper\CoalesceCompositionHelper;
use PHPStan\Analyser\ExprHandler\Helper\ConditionalExpressionHolderHelper;
use PHPStan\Analyser\ExprHandler\Helper\ContextualClosureParameterResolver;
use PHPStan\Analyser\ExprHandler\Helper\CountNarrowingHelper;
use PHPStan\Analyser\ExprHandler\Helper\DefaultNarrowingHelper;
use PHPStan\Analyser\ExprHandler\Helper\DynamicReturnTypeStoragePrimer;
use PHPStan\Analyser\ExprHandler\Helper\EarlyTerminatingCallHelper;
use PHPStan\Analyser\ExprHandler\Helper\ForeachEmptyOrObjectNarrowingHelper;
use PHPStan\Analyser\ExprHandler\Helper\FuncCallScopeEffectsHelper;
use PHPStan\Analyser\ExprHandler\Helper\IdenticalNarrowingHelper;
use PHPStan\Analyser\ExprHandler\Helper\ImplicitToStringCallHelper;
use PHPStan\Analyser\ExprHandler\Helper\IncDecTypeHelper;
use PHPStan\Analyser\ExprHandler\Helper\MethodCallReturnTypeHelper;
use PHPStan\Analyser\ExprHandler\Helper\MethodThrowPointHelper;
use PHPStan\Analyser\ExprHandler\Helper\NonNullabilityHelper;
use PHPStan\Analyser\ExprHandler\Helper\OutputBufferHelper;
use PHPStan\Analyser\ExprHandler\Helper\VirtualExprResultHelper;
use PHPStan\Analyser\ExprHandler\IncludeHandler;
use PHPStan\Analyser\ExprHandler\InstanceofHandler;
use PHPStan\Analyser\ExprHandler\InterpolatedStringHandler;
use PHPStan\Analyser\ExprHandler\IssetHandler;
use PHPStan\Analyser\ExprHandler\MatchHandler;
use PHPStan\Analyser\ExprHandler\MethodCallHandler;
use PHPStan\Analyser\ExprHandler\NewHandler;
use PHPStan\Analyser\ExprHandler\NullsafeMethodCallHandler;
use PHPStan\Analyser\ExprHandler\NullsafePropertyFetchHandler;
use PHPStan\Analyser\ExprHandler\PipeHandler;
use PHPStan\Analyser\ExprHandler\PostDecHandler;
use PHPStan\Analyser\ExprHandler\PostIncHandler;
use PHPStan\Analyser\ExprHandler\PreDecHandler;
use PHPStan\Analyser\ExprHandler\PreIncHandler;
use PHPStan\Analyser\ExprHandler\PrintHandler;
use PHPStan\Analyser\ExprHandler\PropertyFetchHandler;
use PHPStan\Analyser\ExprHandler\ScalarHandler;
use PHPStan\Analyser\ExprHandler\ShellExecHandler;
use PHPStan\Analyser\ExprHandler\StaticCallHandler;
use PHPStan\Analyser\ExprHandler\StaticPropertyFetchHandler;
use PHPStan\Analyser\ExprHandler\TernaryHandler;
use PHPStan\Analyser\ExprHandler\ThrowHandler;
use PHPStan\Analyser\ExprHandler\UnaryMinusHandler;
use PHPStan\Analyser\ExprHandler\UnaryPlusHandler;
use PHPStan\Analyser\ExprHandler\VariableHandler;
use PHPStan\Analyser\ExprHandler\Virtual\AlwaysRememberedExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\ExistingArrayDimFetchHandler;
use PHPStan\Analyser\ExprHandler\Virtual\FunctionCallableNodeHandler;
use PHPStan\Analyser\ExprHandler\Virtual\InstantiationCallableNodeHandler;
use PHPStan\Analyser\ExprHandler\Virtual\IssetExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\MethodCallableNodeHandler;
use PHPStan\Analyser\ExprHandler\Virtual\NativeTypeExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\SetExistingOffsetValueTypeExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\SetOffsetValueTypeExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\StaticMethodCallableNodeHandler;
use PHPStan\Analyser\ExprHandler\Virtual\TypeExprHandler;
use PHPStan\Analyser\ExprHandler\Virtual\UnsetOffsetExprHandler;
use PHPStan\Analyser\ExprHandler\YieldFromHandler;
use PHPStan\Analyser\ExprHandler\YieldHandler;
use PHPStan\Analyser\FileAnalyser;
use PHPStan\Analyser\Generics\ClosureSignatureInference;
use PHPStan\Analyser\Generics\StaticVariableInference;
use PHPStan\Analyser\Generics\TemplateArgumentObserver;
use PHPStan\Analyser\Generics\TemplateArgumentResolver;
use PHPStan\Analyser\Ignore\IgnoredErrorHelper;
use PHPStan\Analyser\Ignore\IgnoreErrorsConfigFixer;
use PHPStan\Analyser\Ignore\IgnoreLexer;
use PHPStan\Analyser\Ignore\LineIgnoreFixer;
use PHPStan\Analyser\Ignore\UnmatchedIgnoreFixer;
use PHPStan\Analyser\InternalScopeFactory;
use PHPStan\Analyser\InternalScopeFactoryFactory;
use PHPStan\Analyser\IssetabilityDescriptor;
use PHPStan\Analyser\LazyInternalScopeFactory;
use PHPStan\Analyser\LocalIgnoresProcessor;
use PHPStan\Analyser\MutatingScope;
use PHPStan\Analyser\NodeScopeResolver;
use PHPStan\Analyser\ParametersProcessor;
use PHPStan\Analyser\PhpDocsResolver;
use PHPStan\Analyser\PropertyHooksProcessor;
use PHPStan\Analyser\PropertyHookThrowPointsResolver;
use PHPStan\Analyser\ResultCache\ClassResultCacheValueExtension;
use PHPStan\Analyser\ResultCache\ConstantResultCacheValueExtension;
use PHPStan\Analyser\ResultCache\DirectoryResultCacheValueExtension;
use PHPStan\Analyser\ResultCache\FileResultCacheValueExtension;
use PHPStan\Analyser\ResultCache\FunctionResultCacheValueExtension;
use PHPStan\Analyser\ResultCache\ResultCacheClearer;
use PHPStan\Analyser\ResultCache\ResultCacheManager;
use PHPStan\Analyser\ResultCache\ResultCacheManagerFactory;
use PHPStan\Analyser\RicherScopeGetTypeHelper;
use PHPStan\Analyser\RuleErrorTransformer;
use PHPStan\Analyser\ScopeFactory;
use PHPStan\Analyser\StatementsHandler;
use PHPStan\Analyser\StmtHandler\BlockHandler;
use PHPStan\Analyser\StmtHandler\BreakContinueHandler;
use PHPStan\Analyser\StmtHandler\ClassConstHandler;
use PHPStan\Analyser\StmtHandler\ClassLikeHandler;
use PHPStan\Analyser\StmtHandler\ClassMethodHandler;
use PHPStan\Analyser\StmtHandler\ConstHandler;
use PHPStan\Analyser\StmtHandler\DeclareHandler;
use PHPStan\Analyser\StmtHandler\DoWhileHandler;
use PHPStan\Analyser\StmtHandler\EchoHandler;
use PHPStan\Analyser\StmtHandler\EnumCaseHandler;
use PHPStan\Analyser\StmtHandler\ExpressionHandler;
use PHPStan\Analyser\StmtHandler\ForeachHandler;
use PHPStan\Analyser\StmtHandler\ForHandler;
use PHPStan\Analyser\StmtHandler\FunctionHandler;
use PHPStan\Analyser\StmtHandler\GlobalHandler;
use PHPStan\Analyser\StmtHandler\GotoHandler;
use PHPStan\Analyser\StmtHandler\GroupUseHandler;
use PHPStan\Analyser\StmtHandler\IfHandler;
use PHPStan\Analyser\StmtHandler\InlineHtmlHandler;
use PHPStan\Analyser\StmtHandler\LabelHandler;
use PHPStan\Analyser\StmtHandler\NamespaceHandler;
use PHPStan\Analyser\StmtHandler\NopHandler;
use PHPStan\Analyser\StmtHandler\PropertyHandler;
use PHPStan\Analyser\StmtHandler\ReturnHandler;
use PHPStan\Analyser\StmtHandler\StaticVariableHandler;
use PHPStan\Analyser\StmtHandler\SwitchHandler;
use PHPStan\Analyser\StmtHandler\TraitHandler;
use PHPStan\Analyser\StmtHandler\TraitUseHandler;
use PHPStan\Analyser\StmtHandler\TryCatchHandler;
use PHPStan\Analyser\StmtHandler\UnsetHandler;
use PHPStan\Analyser\StmtHandler\UseHandler;
use PHPStan\Analyser\StmtHandler\WhileHandler;
use PHPStan\Analyser\TypeSpecifier;
use PHPStan\Analyser\TypeSpecifierFactory;
use PHPStan\Analyser\ValueDependencyCollector;
use PHPStan\Analyser\ValueDependencyDeclarationDependencyTracker;
use PHPStan\Analyser\VarAnnotationProcessor;
use PHPStan\Analyser\VariableFlow;
use PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction;
use PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod;
use PHPStan\BetterReflection\Reflector\Reflector;
use PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber;
use PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber;
use PHPStan\BetterReflection\SourceLocator\Type\Composer\Psr\PsrAutoloaderMapping;
use PHPStan\BetterReflection\SourceLocator\Type\SourceLocator;
use PHPStan\Broker\AnonymousClassNameHelper;
use PHPStan\Cache\Cache;
use PHPStan\Cache\FileCacheStorage;
use PHPStan\Collectors\Registry;
use PHPStan\Collectors\RegistryFactory;
use PHPStan\Command\AnalyseApplication;
use PHPStan\Command\AnalyserRunner;
use PHPStan\Command\BootstrapFilesRunner;
use PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter;
use PHPStan\Command\ErrorFormatter\CiDetectedErrorFormatter;
use PHPStan\Command\ErrorFormatter\GithubErrorFormatter;
use PHPStan\Command\ErrorFormatter\GitlabErrorFormatter;
use PHPStan\Command\ErrorFormatter\JsonErrorFormatter;
use PHPStan\Command\ErrorFormatter\JunitErrorFormatter;
use PHPStan\Command\ErrorFormatter\RawErrorFormatter;
use PHPStan\Command\ErrorFormatter\TableErrorFormatter;
use PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter;
use PHPStan\Command\FixerApplication;
use PHPStan\Command\FixerWorkerRunner;
use PHPStan\Command\Neon2Attributes\Neon2AttributesMigrator;
use PHPStan\Command\Neon2Attributes\PhpClassAttributesWriter;
use PHPStan\Dependency\Dependencies;
use PHPStan\Dependency\DependencyResolver;
use PHPStan\Dependency\ExportedNodeFetcher;
use PHPStan\Dependency\ExportedNodeResolver;
use PHPStan\Dependency\ExportedNodeVisitor;
use PHPStan\Dependency\PackageDependencyResolver;
use PHPStan\DependencyInjection\Container;
use PHPStan\DependencyInjection\DerivativeContainerFactory;
use PHPStan\DependencyInjection\LazyExtensionsCollection;
use PHPStan\DependencyInjection\MemoizingContainer;
use PHPStan\DependencyInjection\Nette\NetteContainer;
use PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider;
use PHPStan\DependencyInjection\Reflection\LazyClassReflectionExtensionRegistryProvider;
use PHPStan\Diagnose\PHPStanDiagnoseExtension;
use PHPStan\Diagnose\SystemResourcesDiagnoseExtension;
use PHPStan\File\DeduplicatingFileReader;
use PHPStan\File\DirectoryWalker;
use PHPStan\File\FileContentHasher;
use PHPStan\File\FileExcluder;
use PHPStan\File\FileExcluderFactory;
use PHPStan\File\FileExcluderRawFactory;
use PHPStan\File\FileFinder;
use PHPStan\File\FileHelper;
use PHPStan\File\FileMonitorFactory;
use PHPStan\File\FileStatSignatures;
use PHPStan\File\FuzzyRelativePathHelper;
use PHPStan\File\HashingFileMonitor;
use PHPStan\File\IncludedFilePathResolver;
use PHPStan\File\ParentDirectoryRelativePathHelper;
use PHPStan\File\RelativePathHelper;
use PHPStan\File\SimpleRelativePathHelper;
use PHPStan\Fixable\ErrorFixer;
use PHPStan\Fixable\Patcher;
use PHPStan\Fixable\PhpDoc\PhpDocEditor;
use PHPStan\Internal\HttpClientFactory;
use PHPStan\Neon\Printer;
use PHPStan\Node\Printer\ExprPrinter;
use PHPStan\Parallel\ForkParallelChecker;
use PHPStan\Parallel\ParallelAnalyser;
use PHPStan\Parallel\Scheduler;
use PHPStan\Parallel\WorkerRunner;
use PHPStan\Parser\AnonymousClassVisitor;
use PHPStan\Parser\ArrayFilterArgVisitor;
use PHPStan\Parser\ArrayFindArgVisitor;
use PHPStan\Parser\ArrayMapArgVisitor;
use PHPStan\Parser\ArrayOffsetNormalizingVisitor;
use PHPStan\Parser\ArrayWalkArgVisitor;
use PHPStan\Parser\ArrowFunctionArgVisitor;
use PHPStan\Parser\CachedParser;
use PHPStan\Parser\CleaningParser;
use PHPStan\Parser\ClosureArgVisitor;
use PHPStan\Parser\ClosureBindArgVisitor;
use PHPStan\Parser\ClosureBindToVarVisitor;
use PHPStan\Parser\CurlSetOptArgVisitor;
use PHPStan\Parser\CurlSetOptArrayArgVisitor;
use PHPStan\Parser\DeclarePositionVisitor;
use PHPStan\Parser\GotoLabelVisitor;
use PHPStan\Parser\ImmediatelyInvokedClosureVisitor;
use PHPStan\Parser\ImplodeArgVisitor;
use PHPStan\Parser\LastConditionVisitor;
use PHPStan\Parser\LexerFactory;
use PHPStan\Parser\MagicConstantParamDefaultVisitor;
use PHPStan\Parser\NewAssignedToPropertyVisitor;
use PHPStan\Parser\ParentStmtTypesVisitor;
use PHPStan\Parser\PathRoutingParser;
use PHPStan\Parser\PhpParserDecorator;
use PHPStan\Parser\PhpParserFactory;
use PHPStan\Parser\RichParser;
use PHPStan\Parser\SimpleParser;
use PHPStan\Parser\StandaloneThrowExprVisitor;
use PHPStan\Parser\StubParser;
use PHPStan\Parser\TryCatchTypeVisitor;
use PHPStan\Parser\TypeTraverserInstanceofVisitor;
use PHPStan\Parser\UseAliasVisitor;
use PHPStan\Php\ComposerPhpVersionFactory;
use PHPStan\Php\ConfiguredPhpVersionRangeHelper;
use PHPStan\Php\PhpVersion;
use PHPStan\Php\PhpVersionFactory;
use PHPStan\Php\PhpVersionFactoryFactory;
use PHPStan\PhpDoc\BcMathNumberStubFilesExtension;
use PHPStan\PhpDoc\ConstExprNodeResolver;
use PHPStan\PhpDoc\DefaultStubFilesProvider;
use PHPStan\PhpDoc\ExtDsStubFilesExtension;
use PHPStan\PhpDoc\JsonValidateStubFilesExtension;
use PHPStan\PhpDoc\LazyTypeNodeResolverExtensionRegistryProvider;
use PHPStan\PhpDoc\PhpDocInheritanceResolver;
use PHPStan\PhpDoc\PhpDocNodeResolver;
use PHPStan\PhpDoc\PhpDocStringResolver;
use PHPStan\PhpDoc\ReflectionClassStubFilesExtension;
use PHPStan\PhpDoc\ReflectionEnumStubFilesExtension;
use PHPStan\PhpDoc\ResolvedPhpDocBlock;
use PHPStan\PhpDoc\SocketSelectStubFilesExtension;
use PHPStan\PhpDoc\StubFilesProvider;
use PHPStan\PhpDoc\StubPhpDocProvider;
use PHPStan\PhpDoc\StubValidator;
use PHPStan\PhpDoc\TypeNodeResolver;
use PHPStan\PhpDoc\TypeNodeResolverExtensionRegistryProvider;
use PHPStan\PhpDoc\TypeStringResolver;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;
use PHPStan\PhpDocParser\ParserConfig;
use PHPStan\Process\CpuCoreCounter;
use PHPStan\Process\Restart\RestartDiagnoseExtension;
use PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension;
use PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension;
use PHPStan\Reflection\Assertions;
use PHPStan\Reflection\AttributeReflectionFactory;
use PHPStan\Reflection\BetterReflection\BetterReflectionProvider;
use PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory;
use PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector;
use PHPStan\Reflection\BetterReflection\SourceLocator\BootstrapAutoloaderExceptionReporter;
use PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor;
use PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker;
use PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocator;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocator;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory;
use PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository;
use PHPStan\Reflection\BetterReflection\SourceLocator\PhpFileCleaner;
use PHPStan\Reflection\BetterReflection\SourceLocator\PreForkDirectorySymbolScanner;
use PHPStan\Reflection\BetterReflection\SourceLocator\SymbolFinderInFiles;
use PHPStan\Reflection\BetterReflection\SourceStubber\ExtensionVersionProvider;
use PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory;
use PHPStan\Reflection\BetterReflection\SourceStubber\ReflectionSourceStubberFactory;
use PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension;
use PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumDynamicReturnTypeExtension;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ClassReflectionFactory;
use PHPStan\Reflection\ConstructorsHelper;
use PHPStan\Reflection\Deprecation\DeprecationProvider;
use PHPStan\Reflection\FunctionReflectionFactory;
use PHPStan\Reflection\InitializerExprTypeResolver;
use PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension;
use PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension;
use PHPStan\Reflection\ParameterAllowedConstantsMapProvider;
use PHPStan\Reflection\Php\EnumAllowedSubTypesClassReflectionExtension;
use PHPStan\Reflection\Php\PhpClassReflectionExtension;
use PHPStan\Reflection\Php\PhpFunctionReflection;
use PHPStan\Reflection\Php\PhpMethodReflection;
use PHPStan\Reflection\Php\PhpMethodReflectionFactory;
use PHPStan\Reflection\Php\SealedAllowedSubTypesClassReflectionExtension;
use PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension;
use PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension;
use PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Reflection\ReflectionProvider\LazyReflectionProviderProvider;
use PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory;
use PHPStan\Reflection\ReflectionProvider\ReflectionProviderProvider;
use PHPStan\Reflection\RequireExtension\RequireExtendsMethodsClassReflectionExtension;
use PHPStan\Reflection\RequireExtension\RequireExtendsPropertiesClassReflectionExtension;
use PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider;
use PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider;
use PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider;
use PHPStan\Reflection\SignatureMap\SignatureMapParser;
use PHPStan\Reflection\SignatureMap\SignatureMapProvider;
use PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory;
use PHPStan\Rules\Api\ApiClassConstantUsageExtension;
use PHPStan\Rules\Api\ApiClassNameUsageExtension;
use PHPStan\Rules\Api\ApiInstanceofRule;
use PHPStan\Rules\Api\ApiInstanceofTypeRule;
use PHPStan\Rules\Api\ApiInstantiationRule;
use PHPStan\Rules\Api\ApiMethodUsageExtension;
use PHPStan\Rules\Api\ApiRuleHelper;
use PHPStan\Rules\Api\GetTemplateTypeRule;
use PHPStan\Rules\Api\NodeConnectingVisitorAttributesRule;
use PHPStan\Rules\Api\OldPhpParser4ClassRule;
use PHPStan\Rules\Api\PhpStanNamespaceIn3rdPartyPackageRule;
use PHPStan\Rules\Api\RuntimeReflectionFunctionUsageExtension;
use PHPStan\Rules\Api\RuntimeReflectionInstantiationUsageExtension;
use PHPStan\Rules\Arrays\ArrayDestructuringRule;
use PHPStan\Rules\Arrays\ArrayUnpackingRule;
use PHPStan\Rules\Arrays\DeadForeachRule;
use PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule;
use PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule;
use PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule;
use PHPStan\Rules\Arrays\IterableInForeachRule;
use PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck;
use PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule;
use PHPStan\Rules\Arrays\OffsetAccessAssignmentRule;
use PHPStan\Rules\Arrays\OffsetAccessAssignOpRule;
use PHPStan\Rules\Arrays\OffsetAccessValueAssignmentRule;
use PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule;
use PHPStan\Rules\Arrays\UnpackIterableInArrayRule;
use PHPStan\Rules\AttributesCheck;
use PHPStan\Rules\Cast\DeprecatedCastRule;
use PHPStan\Rules\Cast\EchoRule;
use PHPStan\Rules\Cast\InvalidCastRule;
use PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule;
use PHPStan\Rules\Cast\PrintRule;
use PHPStan\Rules\Cast\UnsetCastRule;
use PHPStan\Rules\Cast\VoidCastRule;
use PHPStan\Rules\ClassCaseSensitivityCheck;
use PHPStan\Rules\Classes\AccessPrivateConstantThroughStaticRule;
use PHPStan\Rules\Classes\AllowedSubTypesRule;
use PHPStan\Rules\Classes\ClassAttributesRule;
use PHPStan\Rules\Classes\ClassConstantAttributesRule;
use PHPStan\Rules\Classes\ClassConstantRule;
use PHPStan\Rules\Classes\ConsistentConstructorHelper;
use PHPStan\Rules\Classes\DuplicateDeclarationHelper;
use PHPStan\Rules\Classes\DuplicateDeclarationRule;
use PHPStan\Rules\Classes\DuplicateTraitDeclarationRule;
use PHPStan\Rules\Classes\EnumSanityRule;
use PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule;
use PHPStan\Rules\Classes\ExistingClassesInEnumImplementsRule;
use PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule;
use PHPStan\Rules\Classes\ExistingClassInClassExtendsRule;
use PHPStan\Rules\Classes\ExistingClassInInstanceOfRule;
use PHPStan\Rules\Classes\ExistingClassInTraitUseRule;
use PHPStan\Rules\Classes\ImpossibleInstanceOfRule;
use PHPStan\Rules\Classes\InstantiationCallableRule;
use PHPStan\Rules\Classes\InstantiationRule;
use PHPStan\Rules\Classes\InvalidPromotedPropertiesRule;
use PHPStan\Rules\Classes\LocalTypeAliasesCheck;
use PHPStan\Rules\Classes\LocalTypeAliasesRule;
use PHPStan\Rules\Classes\LocalTypeTraitAliasesRule;
use PHPStan\Rules\Classes\LocalTypeTraitUseAliasesRule;
use PHPStan\Rules\Classes\MethodTagCheck;
use PHPStan\Rules\Classes\MethodTagRule;
use PHPStan\Rules\Classes\MethodTagTraitRule;
use PHPStan\Rules\Classes\MethodTagTraitUseRule;
use PHPStan\Rules\Classes\MixinCheck;
use PHPStan\Rules\Classes\MixinRule;
use PHPStan\Rules\Classes\MixinTraitRule;
use PHPStan\Rules\Classes\MixinTraitUseRule;
use PHPStan\Rules\Classes\NewStaticInAbstractClassStaticMethodRule;
use PHPStan\Rules\Classes\NewStaticRule;
use PHPStan\Rules\Classes\NonClassAttributeClassRule;
use PHPStan\Rules\Classes\PropertyTagCheck;
use PHPStan\Rules\Classes\PropertyTagRule;
use PHPStan\Rules\Classes\PropertyTagTraitRule;
use PHPStan\Rules\Classes\PropertyTagTraitUseRule;
use PHPStan\Rules\Classes\ReadOnlyClassRule;
use PHPStan\Rules\Classes\RequireExtendsRule;
use PHPStan\Rules\Classes\RequireImplementsRule;
use PHPStan\Rules\Classes\TraitAttributeClassRule;
use PHPStan\Rules\Classes\UnusedConstructorParametersRule;
use PHPStan\Rules\ClassForbiddenNameCheck;
use PHPStan\Rules\ClassNameCheck;
use PHPStan\Rules\Comparison\BooleanAndConstantConditionRule;
use PHPStan\Rules\Comparison\BooleanNotConstantConditionRule;
use PHPStan\Rules\Comparison\BooleanOrConstantConditionRule;
use PHPStan\Rules\Comparison\ConstantConditionInTraitHelper;
use PHPStan\Rules\Comparison\ConstantConditionInTraitRule;
use PHPStan\Rules\Comparison\ConstantConditionRuleHelper;
use PHPStan\Rules\Comparison\ConstantLooseComparisonRule;
use PHPStan\Rules\Comparison\DoWhileLoopConstantConditionRule;
use PHPStan\Rules\Comparison\ElseIfConstantConditionRule;
use PHPStan\Rules\Comparison\FunctionCallConstantConditionHelper;
use PHPStan\Rules\Comparison\FunctionCallConstantConditionRule;
use PHPStan\Rules\Comparison\IfConstantConditionRule;
use PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule;
use PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper;
use PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule;
use PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule;
use PHPStan\Rules\Comparison\ImpossibleInArrayHaystackFiniteTypesRule;
use PHPStan\Rules\Comparison\LogicalXorConstantConditionRule;
use PHPStan\Rules\Comparison\MatchExpressionRule;
use PHPStan\Rules\Comparison\NumberComparisonOperatorsConstantConditionRule;
use PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule;
use PHPStan\Rules\Comparison\SwitchConditionRule;
use PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule;
use PHPStan\Rules\Comparison\UsageOfVoidMatchExpressionRule;
use PHPStan\Rules\Comparison\WhileLoopAlwaysFalseConditionRule;
use PHPStan\Rules\Comparison\WhileLoopAlwaysTrueConditionRule;
use PHPStan\Rules\Constants\ClassAsClassConstantRule;
use PHPStan\Rules\Constants\ConstantAttributesRule;
use PHPStan\Rules\Constants\ConstantRule;
use PHPStan\Rules\Constants\DynamicClassConstantFetchRule;
use PHPStan\Rules\Constants\FinalConstantRule;
use PHPStan\Rules\Constants\FinalPrivateConstantRule;
use PHPStan\Rules\Constants\MagicConstantContextRule;
use PHPStan\Rules\Constants\MissingClassConstantTypehintRule;
use PHPStan\Rules\Constants\NativeTypedClassConstantRule;
use PHPStan\Rules\Constants\OverrideAttributeOnClassConstantCheck;
use PHPStan\Rules\Constants\OverridingConstantRule;
use PHPStan\Rules\Constants\ValueAssignedToClassConstantRule;
use PHPStan\Rules\Constants\ValueAssignedToDefineRule;
use PHPStan\Rules\Constants\ValueAssignedToGlobalConstantRule;
use PHPStan\Rules\DateIntervalInstantiationRule;
use PHPStan\Rules\DateTimeInstantiationRule;
use PHPStan\Rules\DeadCode\CallToConstructorStatementWithoutImpurePointsRule;
use PHPStan\Rules\DeadCode\CallToFunctionStatementWithoutImpurePointsRule;
use PHPStan\Rules\DeadCode\CallToMethodStatementWithoutImpurePointsRule;
use PHPStan\Rules\DeadCode\CallToStaticMethodStatementWithoutImpurePointsRule;
use PHPStan\Rules\DeadCode\ConstructorWithoutImpurePointsCollector;
use PHPStan\Rules\DeadCode\FunctionWithoutImpurePointsCollector;
use PHPStan\Rules\DeadCode\MethodWithoutImpurePointsCollector;
use PHPStan\Rules\DeadCode\NoopRule;
use PHPStan\Rules\DeadCode\PossiblyPureCallTransitivePurityResolver;
use PHPStan\Rules\DeadCode\PossiblyPureFuncCallCollector;
use PHPStan\Rules\DeadCode\PossiblyPureMethodCallCollector;
use PHPStan\Rules\DeadCode\PossiblyPureNewCollector;
use PHPStan\Rules\DeadCode\PossiblyPureStaticCallCollector;
use PHPStan\Rules\DeadCode\UnreachableStatementRule;
use PHPStan\Rules\DeadCode\UnusedPrivateConstantRule;
use PHPStan\Rules\DeadCode\UnusedPrivateMethodRule;
use PHPStan\Rules\DeadCode\UnusedPrivatePropertyRule;
use PHPStan\Rules\DeadCode\UnusedVariableRule;
use PHPStan\Rules\Debug\DebugScopeRule;
use PHPStan\Rules\Debug\DumpNativeTypeRule;
use PHPStan\Rules\Debug\DumpPhpDocTypeRule;
use PHPStan\Rules\Debug\DumpTypeRule;
use PHPStan\Rules\Debug\FileAssertRule;
use PHPStan\Rules\EnumCases\EnumCaseAttributesRule;
use PHPStan\Rules\EnumCases\EnumCaseOutsideEnumRule;
use PHPStan\Rules\EnumCases\OverridingEnumCaseRule;
use PHPStan\Rules\Exceptions\CatchWithUnthrownExceptionRule;
use PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule;
use PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver;
use PHPStan\Rules\Exceptions\ExceptionTypeResolver;
use PHPStan\Rules\Exceptions\MethodThrowTypeCovarianceRule;
use PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule;
use PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule;
use PHPStan\Rules\Exceptions\MissingCheckedExceptionInPropertyHookThrowsRule;
use PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck;
use PHPStan\Rules\Exceptions\NoncapturingCatchRule;
use PHPStan\Rules\Exceptions\OverwrittenExitPointByFinallyRule;
use PHPStan\Rules\Exceptions\ReturnInFinallyRule;
use PHPStan\Rules\Exceptions\ThrowExpressionRule;
use PHPStan\Rules\Exceptions\ThrowExprTypeRule;
use PHPStan\Rules\Exceptions\ThrowsVoidFunctionWithExplicitThrowPointRule;
use PHPStan\Rules\Exceptions\ThrowsVoidMethodWithExplicitThrowPointRule;
use PHPStan\Rules\Exceptions\ThrowsVoidPropertyHookWithExplicitThrowPointRule;
use PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule;
use PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule;
use PHPStan\Rules\Exceptions\TooWidePropertyHookThrowTypeRule;
use PHPStan\Rules\Exceptions\TooWideThrowTypeCheck;
use PHPStan\Rules\FunctionCallParametersCheck;
use PHPStan\Rules\FunctionDefinitionCheck;
use PHPStan\Rules\FunctionReturnTypeCheck;
use PHPStan\Rules\Functions\ArrayFilterRule;
use PHPStan\Rules\Functions\ArrayValuesRule;
use PHPStan\Rules\Functions\ArrowFunctionAttributesRule;
use PHPStan\Rules\Functions\ArrowFunctionReturnNullsafeByRefRule;
use PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule;
use PHPStan\Rules\Functions\CallCallablesRule;
use PHPStan\Rules\Functions\CallToFunctionParametersRule;
use PHPStan\Rules\Functions\CallToFunctionStatementWithNoDiscardRule;
use PHPStan\Rules\Functions\CallToFunctionStatementWithoutSideEffectsRule;
use PHPStan\Rules\Functions\CallToNonExistentFunctionRule;
use PHPStan\Rules\Functions\CallUserFuncRule;
use PHPStan\Rules\Functions\ClosureAttributesRule;
use PHPStan\Rules\Functions\ClosureReturnTypeRule;
use PHPStan\Rules\Functions\DefineParametersRule;
use PHPStan\Rules\Functions\ExistingClassesInArrowFunctionTypehintsRule;
use PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule;
use PHPStan\Rules\Functions\FilterVarRule;
use PHPStan\Rules\Functions\FunctionAttributesRule;
use PHPStan\Rules\Functions\FunctionCallableRule;
use PHPStan\Rules\Functions\ImplodeParameterCastableToStringRule;
use PHPStan\Rules\Functions\IncompatibleArrowFunctionDefaultParameterTypeRule;
use PHPStan\Rules\Functions\IncompatibleClosureDefaultParameterTypeRule;
use PHPStan\Rules\Functions\InnerFunctionRule;
use PHPStan\Rules\Functions\InvalidLexicalVariablesInClosureUseRule;
use PHPStan\Rules\Functions\InvalidParameterNameRule;
use PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule;
use PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule;
use PHPStan\Rules\Functions\ParamAttributesRule;
use PHPStan\Rules\Functions\ParameterCastableToNumberRule;
use PHPStan\Rules\Functions\ParameterCastableToStringRule;
use PHPStan\Rules\Functions\PrintfArrayParametersRule;
use PHPStan\Rules\Functions\PrintfParametersRule;
use PHPStan\Rules\Functions\PrintfParameterTypeRule;
use PHPStan\Rules\Functions\RandomIntParametersRule;
use PHPStan\Rules\Functions\RedefinedParametersRule;
use PHPStan\Rules\Functions\ReplaceCountMismatchRule;
use PHPStan\Rules\Functions\ReturnNullsafeByRefRule;
use PHPStan\Rules\Functions\ReturnTypeAfterFinallyRule;
use PHPStan\Rules\Functions\SortParameterCastableToStringRule;
use PHPStan\Rules\Functions\SortWithoutEffectRule;
use PHPStan\Rules\Functions\UnusedClosureUsesRule;
use PHPStan\Rules\Functions\UnusedFunctionParametersRule;
use PHPStan\Rules\Functions\UselessFunctionReturnValueRule;
use PHPStan\Rules\Functions\VariadicParametersDeclarationRule;
use PHPStan\Rules\Generators\YieldFromTypeRule;
use PHPStan\Rules\Generators\YieldInGeneratorRule;
use PHPStan\Rules\Generators\YieldTypeRule;
use PHPStan\Rules\Generics\ClassAncestorsRule;
use PHPStan\Rules\Generics\ClassTemplateTypeRule;
use PHPStan\Rules\Generics\CrossCheckInterfacesHelper;
use PHPStan\Rules\Generics\EnumAncestorsRule;
use PHPStan\Rules\Generics\EnumTemplateTypeRule;
use PHPStan\Rules\Generics\FunctionSignatureVarianceRule;
use PHPStan\Rules\Generics\FunctionTemplateTypeRule;
use PHPStan\Rules\Generics\GenericAncestorsCheck;
use PHPStan\Rules\Generics\GenericObjectTypeCheck;
use PHPStan\Rules\Generics\InterfaceAncestorsRule;
use PHPStan\Rules\Generics\InterfaceTemplateTypeRule;
use PHPStan\Rules\Generics\MethodSignatureVarianceRule;
use PHPStan\Rules\Generics\MethodTagTemplateTypeCheck;
use PHPStan\Rules\Generics\MethodTagTemplateTypeRule;
use PHPStan\Rules\Generics\MethodTagTemplateTypeTraitRule;
use PHPStan\Rules\Generics\MethodTemplateTypeRule;
use PHPStan\Rules\Generics\PropertyVarianceRule;
use PHPStan\Rules\Generics\TemplateTypeCheck;
use PHPStan\Rules\Generics\TraitTemplateTypeRule;
use PHPStan\Rules\Generics\UsedTraitsRule;
use PHPStan\Rules\Generics\VarianceCheck;
use PHPStan\Rules\Ignore\IgnoreParseErrorRule;
use PHPStan\Rules\InternalTag\RestrictedInternalClassConstantUsageExtension;
use PHPStan\Rules\InternalTag\RestrictedInternalClassNameUsageExtension;
use PHPStan\Rules\InternalTag\RestrictedInternalFunctionUsageExtension;
use PHPStan\Rules\InternalTag\RestrictedInternalMethodUsageExtension;
use PHPStan\Rules\InternalTag\RestrictedInternalPropertyUsageExtension;
use PHPStan\Rules\InternalTag\RestrictedInternalUsageHelper;
use PHPStan\Rules\IssetCheck;
use PHPStan\Rules\Keywords\ContinueBreakInLoopRule;
use PHPStan\Rules\Keywords\DeclareStrictTypesRule;
use PHPStan\Rules\Keywords\GotoUndefinedLabelRule;
use PHPStan\Rules\Keywords\RequireFileExistsRule;
use PHPStan\Rules\Keywords\UnusedLabelRule;
use PHPStan\Rules\LazyRegistry;
use PHPStan\Rules\Methods\AbstractMethodInNonAbstractClassRule;
use PHPStan\Rules\Methods\AbstractPrivateMethodRule;
use PHPStan\Rules\Methods\CallMethodsRule;
use PHPStan\Rules\Methods\CallPrivateMethodThroughStaticRule;
use PHPStan\Rules\Methods\CallStaticMethodsRule;
use PHPStan\Rules\Methods\CallToConstructorStatementWithoutSideEffectsRule;
use PHPStan\Rules\Methods\CallToMethodStatementWithNoDiscardRule;
use PHPStan\Rules\Methods\CallToMethodStatementWithoutSideEffectsRule;
use PHPStan\Rules\Methods\CallToStaticMethodStatementWithNoDiscardRule;
use PHPStan\Rules\Methods\CallToStaticMethodStatementWithoutSideEffectsRule;
use PHPStan\Rules\Methods\ConsistentConstructorDeclarationRule;
use PHPStan\Rules\Methods\ConsistentConstructorRule;
use PHPStan\Rules\Methods\ConstructorReturnTypeRule;
use PHPStan\Rules\Methods\ExistingClassesInTypehintsRule;
use PHPStan\Rules\Methods\FinalPrivateMethodRule;
use PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule;
use PHPStan\Rules\Methods\MethodAttributesRule;
use PHPStan\Rules\Methods\MethodCallableRule;
use PHPStan\Rules\Methods\MethodCallCheck;
use PHPStan\Rules\Methods\MethodCallWithPossiblyRenamedNamedArgumentRule;
use PHPStan\Rules\Methods\MethodParameterComparisonHelper;
use PHPStan\Rules\Methods\MethodPrototypeFinder;
use PHPStan\Rules\Methods\MethodSignatureRule;
use PHPStan\Rules\Methods\MethodVisibilityComparisonHelper;
use PHPStan\Rules\Methods\MethodVisibilityInInterfaceRule;
use PHPStan\Rules\Methods\MissingMagicSerializationMethodsRule;
use PHPStan\Rules\Methods\MissingMethodImplementationRule;
use PHPStan\Rules\Methods\MissingMethodParameterTypehintRule;
use PHPStan\Rules\Methods\MissingMethodReturnTypehintRule;
use PHPStan\Rules\Methods\MissingMethodSelfOutTypeRule;
use PHPStan\Rules\Methods\NullsafeMethodCallRule;
use PHPStan\Rules\Methods\OverridingMethodCheck;
use PHPStan\Rules\Methods\OverridingMethodRule;
use PHPStan\Rules\Methods\ParentMethodHelper;
use PHPStan\Rules\Methods\ReturnTypeRule;
use PHPStan\Rules\Methods\StaticMethodCallableRule;
use PHPStan\Rules\Methods\StaticMethodCallCheck;
use PHPStan\Rules\Methods\UnusedMethodParametersRule;
use PHPStan\Rules\Missing\MissingReturnRule;
use PHPStan\Rules\MissingTypehintCheck;
use PHPStan\Rules\Names\UsedNamesRule;
use PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule;
use PHPStan\Rules\Namespaces\ExistingNamesInUseRule;
use PHPStan\Rules\NonStringableDynamicAccessCheck;
use PHPStan\Rules\NullsafeCheck;
use PHPStan\Rules\Operators\BacktickRule;
use PHPStan\Rules\Operators\InvalidAssignVarRule;
use PHPStan\Rules\Operators\InvalidBinaryOperationRule;
use PHPStan\Rules\Operators\InvalidComparisonOperationRule;
use PHPStan\Rules\Operators\InvalidIncDecOperationRule;
use PHPStan\Rules\Operators\InvalidUnaryOperationRule;
use PHPStan\Rules\Operators\PipeOperatorRule;
use PHPStan\Rules\ParameterCastableToStringCheck;
use PHPStan\Rules\ParameterClosureTypeHelper;
use PHPStan\Rules\PhpDoc\AssertRuleHelper;
use PHPStan\Rules\PhpDoc\ConditionalReturnTypeRuleHelper;
use PHPStan\Rules\PhpDoc\FunctionAssertRule;
use PHPStan\Rules\PhpDoc\FunctionConditionalReturnTypeRule;
use PHPStan\Rules\PhpDoc\GenericCallableRuleHelper;
use PHPStan\Rules\PhpDoc\IncompatibleClassConstantPhpDocTypeRule;
use PHPStan\Rules\PhpDoc\IncompatibleParamImmediatelyInvokedCallableRule;
use PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeCheck;
use PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule;
use PHPStan\Rules\PhpDoc\IncompatiblePropertyHookPhpDocTypeRule;
use PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule;
use PHPStan\Rules\PhpDoc\IncompatibleSelfOutTypeRule;
use PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule;
use PHPStan\Rules\PhpDoc\InvalidPhpDocVarTagTypeRule;
use PHPStan\Rules\PhpDoc\InvalidPHPStanDocTagRule;
use PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule;
use PHPStan\Rules\PhpDoc\MethodAssertRule;
use PHPStan\Rules\PhpDoc\MethodConditionalReturnTypeRule;
use PHPStan\Rules\PhpDoc\RequireExtendsCheck;
use PHPStan\Rules\PhpDoc\RequireExtendsDefinitionClassRule;
use PHPStan\Rules\PhpDoc\RequireExtendsDefinitionTraitRule;
use PHPStan\Rules\PhpDoc\RequireImplementsDefinitionClassRule;
use PHPStan\Rules\PhpDoc\RequireImplementsDefinitionTraitRule;
use PHPStan\Rules\PhpDoc\SealedDefinitionClassRule;
use PHPStan\Rules\PhpDoc\SealedDefinitionTraitRule;
use PHPStan\Rules\PhpDoc\UnresolvableTypeHelper;
use PHPStan\Rules\PhpDoc\VarTagChangedExpressionTypeRule;
use PHPStan\Rules\PhpDoc\VarTagTypeRuleHelper;
use PHPStan\Rules\PhpDoc\WrongVariableNameInVarTagRule;
use PHPStan\Rules\Playground\NeverRuleHelper;
use PHPStan\Rules\Properties\AccessPrivatePropertyThroughStaticRule;
use PHPStan\Rules\Properties\AccessPropertiesCheck;
use PHPStan\Rules\Properties\AccessPropertiesInAssignRule;
use PHPStan\Rules\Properties\AccessPropertiesRule;
use PHPStan\Rules\Properties\AccessStaticPropertiesCheck;
use PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule;
use PHPStan\Rules\Properties\AccessStaticPropertiesRule;
use PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule;
use PHPStan\Rules\Properties\ExistingClassesInPropertiesRule;
use PHPStan\Rules\Properties\ExistingClassesInPropertyHookTypehintsRule;
use PHPStan\Rules\Properties\GetNonVirtualPropertyHookReadRule;
use PHPStan\Rules\Properties\InvalidCallablePropertyTypeRule;
use PHPStan\Rules\Properties\MissingPropertyTypehintRule;
use PHPStan\Rules\Properties\MissingReadOnlyByPhpDocPropertyAssignRule;
use PHPStan\Rules\Properties\MissingReadOnlyPropertyAssignRule;
use PHPStan\Rules\Properties\NullsafePropertyFetchRule;
use PHPStan\Rules\Properties\OverridingPropertyRule;
use PHPStan\Rules\Properties\PropertiesInInterfaceRule;
use PHPStan\Rules\Properties\PropertyAssignRefRule;
use PHPStan\Rules\Properties\PropertyAttributesRule;
use PHPStan\Rules\Properties\PropertyDescriptor;
use PHPStan\Rules\Properties\PropertyHookAttributesRule;
use PHPStan\Rules\Properties\PropertyInClassRule;
use PHPStan\Rules\Properties\PropertyReflectionFinder;
use PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule;
use PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRefRule;
use PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRule;
use PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyRule;
use PHPStan\Rules\Properties\ReadOnlyPropertyAssignRefRule;
use PHPStan\Rules\Properties\ReadOnlyPropertyAssignRule;
use PHPStan\Rules\Properties\ReadOnlyPropertyRule;
use PHPStan\Rules\Properties\SetNonVirtualPropertyHookAssignRule;
use PHPStan\Rules\Properties\SetPropertyHookParameterRule;
use PHPStan\Rules\Properties\TypesAssignedToPropertiesRule;
use PHPStan\Rules\Properties\UninitializedPropertyRule;
use PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule;
use PHPStan\Rules\Pure\FunctionPurityCheck;
use PHPStan\Rules\Pure\PureFunctionRule;
use PHPStan\Rules\Pure\PureMethodRule;
use PHPStan\Rules\Pure\PurePropertyHookRule;
use PHPStan\Rules\Regexp\RegularExpressionPatternRule;
use PHPStan\Rules\Regexp\RegularExpressionQuotingRule;
use PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedFunctionCallableUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedMethodCallableUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodCallableUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedStaticPropertyUsageRule;
use PHPStan\Rules\RestrictedUsage\RestrictedUsageOfDeprecatedStringCastRule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Rules\TooWideTypehints\TooWideArrowFunctionReturnTypehintRule;
use PHPStan\Rules\TooWideTypehints\TooWideClosureReturnTypehintRule;
use PHPStan\Rules\TooWideTypehints\TooWideFunctionParameterOutTypeRule;
use PHPStan\Rules\TooWideTypehints\TooWideFunctionReturnTypehintRule;
use PHPStan\Rules\TooWideTypehints\TooWideMethodParameterOutTypeRule;
use PHPStan\Rules\TooWideTypehints\TooWideMethodReturnTypehintRule;
use PHPStan\Rules\TooWideTypehints\TooWideParameterOutTypeCheck;
use PHPStan\Rules\TooWideTypehints\TooWidePropertyTypeRule;
use PHPStan\Rules\TooWideTypehints\TooWideTypeCheck;
use PHPStan\Rules\Traits\ConflictingTraitConstantsRule;
use PHPStan\Rules\Traits\ConstantsInTraitsRule;
use PHPStan\Rules\Traits\NotAnalysedTraitRule;
use PHPStan\Rules\Traits\TraitAttributesRule;
use PHPStan\Rules\Traits\TraitDeclarationCollector;
use PHPStan\Rules\Traits\TraitUseCollector;
use PHPStan\Rules\Traits\UsedTraitFilesCollector;
use PHPStan\Rules\Types\InvalidTypesInUnionRule;
use PHPStan\Rules\UnusedParametersCheck;
use PHPStan\Rules\Variables\AssignToByRefExprFromForeachRule;
use PHPStan\Rules\Variables\CompactVariablesRule;
use PHPStan\Rules\Variables\DefinedVariableRule;
use PHPStan\Rules\Variables\EmptyRule;
use PHPStan\Rules\Variables\InvalidVariableAssignRule;
use PHPStan\Rules\Variables\IssetRule;
use PHPStan\Rules\Variables\NullCoalesceRule;
use PHPStan\Rules\Variables\ParameterOutAssignedTypeRule;
use PHPStan\Rules\Variables\ParameterOutExecutionEndTypeRule;
use PHPStan\Rules\Variables\ParameterOutTypeCheck;
use PHPStan\Rules\Variables\ThisInGlobalStatementRule;
use PHPStan\Rules\Variables\ThisInStaticStatementRule;
use PHPStan\Rules\Variables\UnsetRule;
use PHPStan\Rules\Variables\VariableCloningRule;
use PHPStan\Rules\Whitespace\FileWhitespaceRule;
use PHPStan\Turbo\TurboDiagnoseExtension;
use PHPStan\Type\ArrayUnpackingHelper;
use PHPStan\Type\BitwiseFlagHelper;
use PHPStan\Type\ClosureTypeFactory;
use PHPStan\Type\Constant\OversizedArrayBuilder;
use PHPStan\Type\DynamicReturnTypeExtensionRegistry;
use PHPStan\Type\FileTypeMapper;
use PHPStan\Type\Generic\TemplateTypeMap;
use PHPStan\Type\Generic\TemplateTypeVarianceMap;
use PHPStan\Type\LazyTypeAliasResolverProvider;
use PHPStan\Type\OperatorTypeSpecifyingExtensionRegistry;
use PHPStan\Type\Php\AbsFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayChangeKeyCaseFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayChunkFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayChunkFunctionThrowTypeExtension;
use PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayColumnHelper;
use PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayCombineFunctionThrowTypeExtension;
use PHPStan\Type\Php\ArrayCombineHelper;
use PHPStan\Type\Php\ArrayCountValuesDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayFilterFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayFilterFunctionReturnTypeHelper;
use PHPStan\Type\Php\ArrayFilterParameterClosureTypeExtension;
use PHPStan\Type\Php\ArrayFindFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayFindKeyFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayFindParameterClosureTypeExtension;
use PHPStan\Type\Php\ArrayFirstLastDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayIntersectKeyFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayMapParameterClosureTypeExtension;
use PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayObjectConstructorReturnTypeExtension;
use PHPStan\Type\Php\ArrayPadDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayReplaceFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArraySearchFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension;
use PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\ArrayWalkParameterClosureTypeExtension;
use PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\AssertThrowTypeExtension;
use PHPStan\Type\Php\BackedEnumFromMethodDynamicReturnTypeExtension;
use PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension;
use PHPStan\Type\Php\BcMathNumberOperatorTypeSpecifyingExtension;
use PHPStan\Type\Php\BcMathNumberUnaryOperatorTypeSpecifyingExtension;
use PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension;
use PHPStan\Type\Php\ClampFunctionReturnTypeExtension;
use PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\ClassImplementsFunctionReturnTypeExtension;
use PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension;
use PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension;
use PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension;
use PHPStan\Type\Php\ClosureGetCurrentDynamicReturnTypeExtension;
use PHPStan\Type\Php\CompactFunctionReturnTypeExtension;
use PHPStan\Type\Php\ConstantFunctionReturnTypeExtension;
use PHPStan\Type\Php\ConstantHelper;
use PHPStan\Type\Php\CountCharsFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\CountFunctionReturnTypeExtension;
use PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\CtypeDigitFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\CurlGetinfoFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension;
use PHPStan\Type\Php\DateFormatMethodReturnTypeExtension;
use PHPStan\Type\Php\DateFunctionReturnTypeExtension;
use PHPStan\Type\Php\DateFunctionReturnTypeHelper;
use PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension;
use PHPStan\Type\Php\DateIntervalCreateFromDateStringThrowTypeExtension;
use PHPStan\Type\Php\DateIntervalDynamicReturnTypeExtension;
use PHPStan\Type\Php\DateIntervalFormatDynamicReturnTypeExtension;
use PHPStan\Type\Php\DateIntervalFormatFunctionReturnTypeExtension;
use PHPStan\Type\Php\DateIntervalFormatReturnTypeHelper;
use PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension;
use PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension;
use PHPStan\Type\Php\DateTimeCreateDynamicReturnTypeExtension;
use PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension;
use PHPStan\Type\Php\DateTimeModifyMethodThrowTypeExtension;
use PHPStan\Type\Php\DateTimeModifyReturnTypeExtension;
use PHPStan\Type\Php\DateTimeSubMethodThrowTypeExtension;
use PHPStan\Type\Php\DateTimeZoneConstructorThrowTypeExtension;
use PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension;
use PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension;
use PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension;
use PHPStan\Type\Php\DomDocumentCreateElementDynamicReturnTypeExtension;
use PHPStan\Type\Php\DomDocumentCreateElementDynamicThrowTypeExtension;
use PHPStan\Type\Php\DsMapDynamicMethodThrowTypeExtension;
use PHPStan\Type\Php\DsMapDynamicReturnTypeExtension;
use PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\FilterFunctionFlagsHelper;
use PHPStan\Type\Php\FilterFunctionReturnTypeHelper;
use PHPStan\Type\Php\FilterFunctionsThrowTypeExtension;
use PHPStan\Type\Php\FilterInputDynamicReturnTypeExtension;
use PHPStan\Type\Php\FilterVarArrayDynamicReturnTypeExtension;
use PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension;
use PHPStan\Type\Php\FloatClassFunctionReturnTypeExtension;
use PHPStan\Type\Php\FloatClassFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\FmodFunctionReturnTypeExtension;
use PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension;
use PHPStan\Type\Php\GetClassDynamicReturnTypeExtension;
use PHPStan\Type\Php\GetClassFunctionThrowTypeExtension;
use PHPStan\Type\Php\GetDebugTypeFunctionReturnTypeExtension;
use PHPStan\Type\Php\GetDefinedVarsFunctionReturnTypeExtension;
use PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension;
use PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension;
use PHPStan\Type\Php\GettypeFunctionReturnTypeExtension;
use PHPStan\Type\Php\GmpOperatorTypeSpecifyingExtension;
use PHPStan\Type\Php\GmpUnaryOperatorTypeSpecifyingExtension;
use PHPStan\Type\Php\HashFunctionsReturnTypeExtension;
use PHPStan\Type\Php\HighlightStringDynamicReturnTypeExtension;
use PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension;
use PHPStan\Type\Php\IdateFunctionReturnTypeExtension;
use PHPStan\Type\Php\IdateFunctionReturnTypeHelper;
use PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension;
use PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IniGetReturnTypeExtension;
use PHPStan\Type\Php\IntdivFunctionReturnTypeExtension;
use PHPStan\Type\Php\IntdivThrowTypeExtension;
use PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper;
use PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension;
use PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension;
use PHPStan\Type\Php\JsonThrowTypeExtension;
use PHPStan\Type\Php\LocaltimeFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\LtrimFunctionReturnTypeExtension;
use PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension;
use PHPStan\Type\Php\MbFunctionsReturnTypeExtension;
use PHPStan\Type\Php\MbStrlenFunctionReturnTypeExtension;
use PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension;
use PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension;
use PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension;
use PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension;
use PHPStan\Type\Php\MinMaxFunctionThrowTypeExtension;
use PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension;
use PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\OpensslCipherFunctionsReturnTypeExtension;
use PHPStan\Type\Php\OpenSslCipherMethodsProvider;
use PHPStan\Type\Php\OpenSslEncryptParameterOutTypeExtension;
use PHPStan\Type\Php\OutputBufferingDynamicReturnTypeExtension;
use PHPStan\Type\Php\ParseStrParameterOutTypeExtension;
use PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\PDOConnectReturnTypeExtension;
use PHPStan\Type\Php\PgDmlDynamicReturnTypeExtension;
use PHPStan\Type\Php\PgLastNoticeDynamicReturnTypeExtension;
use PHPStan\Type\Php\PgResultStatusDynamicReturnTypeExtension;
use PHPStan\Type\Php\PowFunctionReturnTypeExtension;
use PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension;
use PHPStan\Type\Php\PregMatchParameterOutTypeExtension;
use PHPStan\Type\Php\PregMatchTypeSpecifyingExtension;
use PHPStan\Type\Php\PregReplaceCallbackClosureTypeExtension;
use PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension;
use PHPStan\Type\Php\PrintfFormatParser;
use PHPStan\Type\Php\PrintfFunctionThrowTypeExtension;
use PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension;
use PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension;
use PHPStan\Type\Php\RandomizerMethodReturnTypeExtension;
use PHPStan\Type\Php\RangeFunctionReturnTypeExtension;
use PHPStan\Type\Php\ReflectionClassConstantConstructorThrowTypeExtension;
use PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension;
use PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension;
use PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension;
use PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension;
use PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension;
use PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension;
use PHPStan\Type\Php\RegexArrayShapeMatcher;
use PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension;
use PHPStan\Type\Php\RoundFunctionReturnTypeExtension;
use PHPStan\Type\Php\RoundFunctionThrowTypeExtension;
use PHPStan\Type\Php\SetTypeFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension;
use PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension;
use PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension;
use PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension;
use PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\SqrtFunctionReturnTypeExtension;
use PHPStan\Type\Php\SscanfFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\StatDynamicReturnTypeExtension;
use PHPStan\Type\Php\StrCaseFunctionsReturnTypeExtension;
use PHPStan\Type\Php\StrContainingTypeSpecifyingExtension;
use PHPStan\Type\Php\StrIncrementDecrementFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrlenFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrlenFunctionTypeSpecifyingExtension;
use PHPStan\Type\Php\StrPadFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrrevFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrShuffleFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrSplitFunctionThrowTypeExtension;
use PHPStan\Type\Php\StrTokFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension;
use PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\SubstrDynamicReturnTypeExtension;
use PHPStan\Type\Php\ThrowableReturnTypeExtension;
use PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension;
use PHPStan\Type\Php\TriggerErrorFunctionThrowTypeExtension;
use PHPStan\Type\Php\TrimCharactersHelper;
use PHPStan\Type\Php\TrimFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\UnserializeFunctionThrowTypeExtension;
use PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension;
use PHPStan\Type\Php\VersionCompareFunctionDynamicThrowTypeExtension;
use PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension;
use PHPStan\Type\PHPStan\ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension;
use PHPStan\Type\Regex\RegexExpressionHelper;
use PHPStan\Type\Regex\RegexGroupParser;
use PHPStan\Type\Type;
use PHPStan\Type\TypeAliasResolver;
use PHPStan\Type\TypeAliasResolverProvider;
use PHPStan\Type\UnaryOperatorTypeSpecifyingExtensionRegistry;
use PHPStan\Type\UsefulTypeAliasResolver;

class Container_98276e52e6 extends _PHPStan_02480d849\Nette\DI\Container
{
    protected $tags = [
        'phpstan.diagnoseExtension' => ['01' => true, '04' => true, '05' => true, '0112' => true, '0587' => true],
        'phpstan.collector' => [
            '016' => true,
            '017' => true,
            '0590' => true,
            '0591' => true,
            '0592' => true,
            '0593' => true,
            '0594' => true,
            '0595' => true,
            '0596' => true,
            '0598' => true,
            '0599' => true,
            '0601' => true,
            '01062' => true,
            '01063' => true,
            '01064' => true,
            '01065' => true,
            '01066' => true,
            '01067' => true,
            '01068' => true,
            '01069' => true,
        ],
        'phpstan.rules.rule' => [
            '020' => true,
            '021' => true,
            '022' => true,
            '023' => true,
            '024' => true,
            '053' => true,
            '054' => true,
            '055' => true,
            '056' => true,
            '057' => true,
            '058' => true,
            '059' => true,
            '060' => true,
            '061' => true,
            '062' => true,
            '0677' => true,
            '0678' => true,
            '0679' => true,
            '0680' => true,
            '0683' => true,
            '0684' => true,
            '0685' => true,
            '0710' => true,
            '0713' => true,
            '0716' => true,
            '0718' => true,
            '0738' => true,
            '0739' => true,
            '0740' => true,
            '0741' => true,
            '0742' => true,
            '0743' => true,
            '0744' => true,
            '0745' => true,
            '0746' => true,
            '0747' => true,
            '0748' => true,
            '0749' => true,
            '0750' => true,
            '0751' => true,
            '0752' => true,
            '0753' => true,
            '0754' => true,
            '0755' => true,
            '0756' => true,
            '0757' => true,
            '0758' => true,
            '0759' => true,
            '0760' => true,
            '0761' => true,
            '0762' => true,
            '0763' => true,
            '0764' => true,
            '0765' => true,
            '0766' => true,
            '0767' => true,
            '0768' => true,
            '0769' => true,
            '0770' => true,
            '0771' => true,
            '0772' => true,
            '0773' => true,
            '0774' => true,
            '0775' => true,
            '0776' => true,
            '0777' => true,
            '0778' => true,
            '0779' => true,
            '0780' => true,
            '0781' => true,
            '0782' => true,
            '0783' => true,
            '0784' => true,
            '0785' => true,
            '0786' => true,
            '0787' => true,
            '0788' => true,
            '0789' => true,
            '0790' => true,
            '0791' => true,
            '0792' => true,
            '0793' => true,
            '0794' => true,
            '0795' => true,
            '0796' => true,
            '0797' => true,
            '0798' => true,
            '0799' => true,
            '0800' => true,
            '0801' => true,
            '0802' => true,
            '0803' => true,
            '0804' => true,
            '0805' => true,
            '0806' => true,
            '0807' => true,
            '0808' => true,
            '0809' => true,
            '0810' => true,
            '0811' => true,
            '0812' => true,
            '0813' => true,
            '0814' => true,
            '0815' => true,
            '0816' => true,
            '0817' => true,
            '0818' => true,
            '0819' => true,
            '0820' => true,
            '0821' => true,
            '0822' => true,
            '0823' => true,
            '0824' => true,
            '0825' => true,
            '0826' => true,
            '0827' => true,
            '0828' => true,
            '0829' => true,
            '0830' => true,
            '0831' => true,
            '0832' => true,
            '0833' => true,
            '0834' => true,
            '0835' => true,
            '0836' => true,
            '0837' => true,
            '0838' => true,
            '0839' => true,
            '0840' => true,
            '0841' => true,
            '0842' => true,
            '0843' => true,
            '0844' => true,
            '0845' => true,
            '0846' => true,
            '0847' => true,
            '0848' => true,
            '0849' => true,
            '0850' => true,
            '0851' => true,
            '0852' => true,
            '0853' => true,
            '0854' => true,
            '0855' => true,
            '0856' => true,
            '0857' => true,
            '0858' => true,
            '0859' => true,
            '0860' => true,
            '0861' => true,
            '0862' => true,
            '0863' => true,
            '0864' => true,
            '0865' => true,
            '0866' => true,
            '0867' => true,
            '0868' => true,
            '0869' => true,
            '0870' => true,
            '0871' => true,
            '0872' => true,
            '0873' => true,
            '0874' => true,
            '0875' => true,
            '0876' => true,
            '0877' => true,
            '0878' => true,
            '0879' => true,
            '0880' => true,
            '0881' => true,
            '0882' => true,
            '0883' => true,
            '0884' => true,
            '0885' => true,
            '0886' => true,
            '0887' => true,
            '0888' => true,
            '0889' => true,
            '0890' => true,
            '0891' => true,
            '0892' => true,
            '0893' => true,
            '0894' => true,
            '0895' => true,
            '0896' => true,
            '0897' => true,
            '0898' => true,
            '0899' => true,
            '0900' => true,
            '0901' => true,
            '0902' => true,
            '0903' => true,
            '0904' => true,
            '0905' => true,
            '0906' => true,
            '0907' => true,
            '0908' => true,
            '0909' => true,
            '0910' => true,
            '0911' => true,
            '0912' => true,
            '0913' => true,
            '0914' => true,
            '0915' => true,
            '0916' => true,
            '0917' => true,
            '0918' => true,
            '0919' => true,
            '0920' => true,
            '0921' => true,
            '0922' => true,
            '0923' => true,
            '0924' => true,
            '0925' => true,
            '0926' => true,
            '0927' => true,
            '0928' => true,
            '0929' => true,
            '0930' => true,
            '0931' => true,
            '0932' => true,
            '0933' => true,
            '0934' => true,
            '0935' => true,
            '0936' => true,
            '0937' => true,
            '0938' => true,
            '0939' => true,
            '0940' => true,
            '0941' => true,
            '0942' => true,
            '0943' => true,
            '0944' => true,
            '0945' => true,
            '0946' => true,
            '0947' => true,
            '0948' => true,
            '0949' => true,
            '0950' => true,
            '0951' => true,
            '0952' => true,
            '0953' => true,
            '0954' => true,
            '0955' => true,
            '0956' => true,
            '0957' => true,
            '0958' => true,
            '0959' => true,
            '0960' => true,
            '0961' => true,
            '0962' => true,
            '0963' => true,
            '0964' => true,
            '0965' => true,
            '0966' => true,
            '0967' => true,
            '0968' => true,
            '0969' => true,
            '0970' => true,
            '0971' => true,
            '0972' => true,
            '0973' => true,
            '0974' => true,
            '0975' => true,
            '0976' => true,
            '0977' => true,
            '0978' => true,
            '0979' => true,
            '0980' => true,
            '0981' => true,
            '0982' => true,
            '0983' => true,
            '0984' => true,
            '0985' => true,
            '0986' => true,
            '0987' => true,
            '0988' => true,
            '0989' => true,
            '0990' => true,
            '0991' => true,
            '0992' => true,
            '0993' => true,
            '0994' => true,
            '0995' => true,
            '0996' => true,
            '0997' => true,
            '0998' => true,
            '0999' => true,
            '01000' => true,
            '01001' => true,
            '01002' => true,
            '01003' => true,
            '01004' => true,
            '01005' => true,
            '01006' => true,
            '01007' => true,
            '01008' => true,
            '01009' => true,
            '01010' => true,
            '01011' => true,
            '01012' => true,
            '01013' => true,
            '01014' => true,
            '01015' => true,
            '01016' => true,
            '01017' => true,
            '01018' => true,
            '01019' => true,
            '01020' => true,
            '01021' => true,
            '01022' => true,
            '01023' => true,
            '01024' => true,
            '01025' => true,
            '01026' => true,
            '01027' => true,
            '01028' => true,
            '01029' => true,
            '01030' => true,
            '01031' => true,
            '01032' => true,
            '01033' => true,
            '01034' => true,
            '01035' => true,
            '01036' => true,
            '01037' => true,
            '01038' => true,
            '01039' => true,
            '01040' => true,
            '01041' => true,
            '01042' => true,
            '01043' => true,
            '01044' => true,
            '01045' => true,
            '01046' => true,
            '01047' => true,
            '01048' => true,
            '01049' => true,
            '01050' => true,
            '01051' => true,
            '01052' => true,
            '01053' => true,
            '01054' => true,
            '01055' => true,
            '01056' => true,
            '01057' => true,
            '01058' => true,
            '01059' => true,
            '01060' => true,
            '01061' => true,
            '01106' => true,
            '01107' => true,
        ],
        'phpstan.restrictedClassNameUsageExtension' => ['089' => true, '093' => true, '01092' => true],
        'phpstan.restrictedMethodUsageExtension' => ['091' => true, '01095' => true],
        'phpstan.restrictedFunctionUsageExtension' => ['092' => true, '01093' => true],
        'phpstan.restrictedClassConstantUsageExtension' => ['094' => true, '01091' => true],
        'phpstan.broker.dynamicFunctionReturnTypeExtension' => [
            '0123' => true,
            '0124' => true,
            '0125' => true,
            '0130' => true,
            '0131' => true,
            '0132' => true,
            '0133' => true,
            '0137' => true,
            '0141' => true,
            '0142' => true,
            '0143' => true,
            '0146' => true,
            '0147' => true,
            '0148' => true,
            '0151' => true,
            '0152' => true,
            '0154' => true,
            '0155' => true,
            '0158' => true,
            '0159' => true,
            '0162' => true,
            '0166' => true,
            '0170' => true,
            '0171' => true,
            '0175' => true,
            '0177' => true,
            '0180' => true,
            '0181' => true,
            '0186' => true,
            '0187' => true,
            '0188' => true,
            '0189' => true,
            '0190' => true,
            '0191' => true,
            '0198' => true,
            '0199' => true,
            '0200' => true,
            '0201' => true,
            '0202' => true,
            '0203' => true,
            '0205' => true,
            '0206' => true,
            '0208' => true,
            '0209' => true,
            '0211' => true,
            '0212' => true,
            '0213' => true,
            '0217' => true,
            '0218' => true,
            '0219' => true,
            '0221' => true,
            '0224' => true,
            '0225' => true,
            '0226' => true,
            '0227' => true,
            '0228' => true,
            '0229' => true,
            '0231' => true,
            '0233' => true,
            '0234' => true,
            '0235' => true,
            '0240' => true,
            '0241' => true,
            '0242' => true,
            '0244' => true,
            '0245' => true,
            '0246' => true,
            '0248' => true,
            '0249' => true,
            '0250' => true,
            '0251' => true,
            '0252' => true,
            '0253' => true,
            '0258' => true,
            '0259' => true,
            '0261' => true,
            '0262' => true,
            '0266' => true,
            '0267' => true,
            '0268' => true,
            '0269' => true,
            '0271' => true,
            '0272' => true,
            '0273' => true,
            '0274' => true,
            '0275' => true,
            '0277' => true,
            '0278' => true,
            '0279' => true,
            '0281' => true,
            '0284' => true,
            '0285' => true,
            '0290' => true,
            '0294' => true,
            '0295' => true,
            '0298' => true,
            '0299' => true,
            '0300' => true,
            '0302' => true,
            '0304' => true,
            '0305' => true,
            '0307' => true,
            '0310' => true,
            '0313' => true,
            '0315' => true,
            '0316' => true,
            '0318' => true,
            '0320' => true,
            '0321' => true,
            '0322' => true,
            '0327' => true,
            '0328' => true,
            '0329' => true,
            '0331' => true,
            '0333' => true,
            '0646' => true,
            '0653' => true,
            '0654' => true,
            '0655' => true,
            '0656' => true,
            '0657' => true,
            '0658' => true,
            '0659' => true,
            '0660' => true,
            '0661' => true,
            '0662' => true,
            '0675' => true,
        ],
        'phpstan.dynamicFunctionThrowTypeExtension' => [
            '0129' => true,
            '0134' => true,
            '0144' => true,
            '0153' => true,
            '0163' => true,
            '0164' => true,
            '0183' => true,
            '0195' => true,
            '0220' => true,
            '0222' => true,
            '0236' => true,
            '0239' => true,
            '0270' => true,
            '0291' => true,
        ],
        'phpstan.broker.dynamicStaticMethodReturnTypeExtension' => [
            '0135' => true,
            '0138' => true,
            '0174' => true,
            '0182' => true,
            '0192' => true,
            '0237' => true,
            '0292' => true,
            '0311' => true,
            '0326' => true,
            '0631' => true,
            '0632' => true,
            '0635' => true,
            '0636' => true,
            '0645' => true,
            '0651' => true,
            '0664' => true,
            '0665' => true,
            '0666' => true,
            '0673' => true,
        ],
        'phpstan.broker.dynamicMethodReturnTypeExtension' => [
            '0135' => true,
            '0145' => true,
            '0165' => true,
            '0169' => true,
            '0172' => true,
            '0181' => true,
            '0185' => true,
            '0243' => true,
            '0265' => true,
            '0287' => true,
            '0308' => true,
            '0334' => true,
            '0536' => true,
            '0634' => true,
            '0637' => true,
            '0638' => true,
            '0639' => true,
            '0640' => true,
            '0641' => true,
            '0642' => true,
            '0643' => true,
            '0644' => true,
            '0647' => true,
            '0648' => true,
            '0649' => true,
            '0650' => true,
            '0652' => true,
            '0663' => true,
            '0667' => true,
            '0668' => true,
            '0669' => true,
            '0670' => true,
            '0671' => true,
            '0672' => true,
            '0674' => true,
            '0676' => true,
            '01080' => true,
            '01081' => true,
            '01082' => true,
            '01083' => true,
            '01084' => true,
            '01085' => true,
            '01086' => true,
            '01087' => true,
            '01088' => true,
            '01089' => true,
            '01090' => true,
            '01096' => true,
            '01097' => true,
            '01098' => true,
            '01099' => true,
            '01104' => true,
            '01105' => true,
        ],
        'phpstan.typeSpecifier.functionTypeSpecifyingExtension' => [
            '0139' => true,
            '0140' => true,
            '0150' => true,
            '0156' => true,
            '0160' => true,
            '0194' => true,
            '0197' => true,
            '0204' => true,
            '0207' => true,
            '0210' => true,
            '0215' => true,
            '0232' => true,
            '0254' => true,
            '0264' => true,
            '0280' => true,
            '0282' => true,
            '0283' => true,
            '0289' => true,
            '0303' => true,
            '0309' => true,
            '0317' => true,
            '0330' => true,
            '01100' => true,
            '01101' => true,
            '01102' => true,
            '01103' => true,
        ],
        'phpstan.dynamicMethodThrowTypeExtension' => ['0149' => true, '0168' => true, '0257' => true, '0306' => true],
        'phpstan.dynamicStaticMethodThrowTypeExtension' => [
            '0167' => true,
            '0193' => true,
            '0196' => true,
            '0230' => true,
            '0255' => true,
            '0256' => true,
            '0288' => true,
            '0301' => true,
            '0314' => true,
            '0332' => true,
        ],
        'phpstan.broker.propertiesClassReflectionExtension' => [
            '0173' => true,
            '0621' => true,
            '0624' => true,
            '0626' => true,
            '0628' => true,
        ],
        'phpstan.resultCacheValueExtension' => [
            '0178' => true,
            '0494' => true,
            '0496' => true,
            '0497' => true,
            '0498' => true,
            '0499' => true,
        ],
        'phpstan.broker.operatorTypeSpecifyingExtension' => ['0179' => true, '0324' => true],
        'phpstan.functionParameterClosureTypeExtension' => [
            '0214' => true,
            '0223' => true,
            '0297' => true,
            '0319' => true,
            '0323' => true,
        ],
        'phpstan.functionParameterOutTypeExtension' => ['0216' => true, '0238' => true, '0276' => true],
        'phpstan.broker.unaryOperatorTypeSpecifyingExtension' => ['0247' => true, '0296' => true],
        'phpstan.typeSpecifier.methodTypeSpecifyingExtension' => ['0263' => true],
        'phpstan.exprHandler' => [
            '0350' => true,
            '0351' => true,
            '0352' => true,
            '0353' => true,
            '0354' => true,
            '0355' => true,
            '0356' => true,
            '0357' => true,
            '0358' => true,
            '0359' => true,
            '0360' => true,
            '0361' => true,
            '0362' => true,
            '0363' => true,
            '0364' => true,
            '0365' => true,
            '0366' => true,
            '0367' => true,
            '0368' => true,
            '0369' => true,
            '0370' => true,
            '0371' => true,
            '0372' => true,
            '0373' => true,
            '0374' => true,
            '0375' => true,
            '0376' => true,
            '0377' => true,
            '0378' => true,
            '0379' => true,
            '0380' => true,
            '0401' => true,
            '0402' => true,
            '0403' => true,
            '0404' => true,
            '0405' => true,
            '0406' => true,
            '0407' => true,
            '0408' => true,
            '0409' => true,
            '0410' => true,
            '0411' => true,
            '0412' => true,
            '0413' => true,
            '0414' => true,
            '0415' => true,
            '0416' => true,
            '0417' => true,
            '0418' => true,
            '0419' => true,
            '0420' => true,
            '0421' => true,
            '0422' => true,
            '0423' => true,
            '0424' => true,
            '0425' => true,
            '0426' => true,
            '0427' => true,
            '0428' => true,
            '0429' => true,
            '0430' => true,
        ],
        'phpstan.perFileAnalysisResettable' => ['0355' => true, '0360' => true, '0384' => true, '0398' => true],
        'phpstan.stmtHandler' => [
            '0433' => true,
            '0434' => true,
            '0435' => true,
            '0436' => true,
            '0437' => true,
            '0438' => true,
            '0439' => true,
            '0440' => true,
            '0441' => true,
            '0442' => true,
            '0443' => true,
            '0444' => true,
            '0445' => true,
            '0446' => true,
            '0447' => true,
            '0448' => true,
            '0449' => true,
            '0450' => true,
            '0451' => true,
            '0452' => true,
            '0453' => true,
            '0454' => true,
            '0455' => true,
            '0456' => true,
            '0457' => true,
            '0458' => true,
            '0459' => true,
            '0460' => true,
            '0461' => true,
            '0462' => true,
            '0463' => true,
            '0464' => true,
        ],
        'phpstan.broker.allowedSubTypesClassReflectionExtension' => ['0511' => true, '0512' => true],
        'phpstan.stubFilesExtension' => [
            '0542' => true,
            '0545' => true,
            '0548' => true,
            '0552' => true,
            '0554' => true,
            '0555' => true,
            '0605' => true,
        ],
        'phpstan.parser.richParserNodeVisitor' => [
            '0556' => true,
            '0557' => true,
            '0558' => true,
            '0559' => true,
            '0560' => true,
            '0561' => true,
            '0562' => true,
            '0563' => true,
            '0564' => true,
            '0565' => true,
            '0567' => true,
            '0568' => true,
            '0569' => true,
            '0570' => true,
            '0571' => true,
            '0572' => true,
            '0573' => true,
            '0574' => true,
            '0575' => true,
            '0576' => true,
            '0577' => true,
            '0578' => true,
            '0579' => true,
            '0580' => true,
        ],
        'phpstan.methodParameterClosureTypeExtension' => ['0589' => true],
        'phpstan.staticMethodParameterClosureTypeExtension' => ['0589' => true],
        'phpstan.broker.methodsClassReflectionExtension' => [
            '0606' => true,
            '0608' => true,
            '0609' => true,
            '0610' => true,
            '0611' => true,
            '0612' => true,
            '0613' => true,
            '0614' => true,
            '0615' => true,
            '0616' => true,
            '0617' => true,
            '0618' => true,
            '0619' => true,
            '0620' => true,
            '01109' => true,
        ],
        'phpstan.staticMethodParameterOutTypeExtension' => ['0692' => true],
        'phpstan.phpDoc.typeNodeResolverExtension' => [
            '0693' => true,
            '0694' => true,
            '0695' => true,
            '0696' => true,
            '0697' => true,
            '0698' => true,
            '0699' => true,
        ],
        'phpstan.restrictedPropertyUsageExtension' => ['01094' => true],
    ];

    protected $types = ['container' => '_PHPStan_02480d849\Nette\DI\Container'];

    protected $aliases = [];

    protected $wiring = [
        '_PHPStan_02480d849\Nette\DI\Container' => [['container']],
        'PHPStan\Diagnose\DiagnoseExtension' => [['01', '04', '05', '0112', '0587']],
        'PHPStan\Diagnose\SystemResourcesDiagnoseExtension' => [['01']],
        'PHPStan\Parallel\ParallelAnalyser' => [['02']],
        'PHPStan\Parallel\WorkerRunner' => [['03']],
        'PHPStan\Parallel\ForkParallelChecker' => [['04']],
        'PHPStan\Parallel\Scheduler' => [['05']],
        'PHPStan\Php\ComposerPhpVersionFactory' => [['06']],
        'PHPStan\Php\ConfiguredPhpVersionRangeHelper' => [['07']],
        'PHPStan\Php\PhpVersionFactoryFactory' => [['08']],
        'PHPStan\Php\PhpVersion' => [['09']],
        'PHPStan\Php\PhpVersionFactory' => [['010']],
        'PHPStan\DependencyInjection\DerivativeContainerFactory' => [['011']],
        'PHPStan\DependencyInjection\Container' => [['012'], ['013']],
        'PHPStan\DependencyInjection\Nette\NetteContainer' => [['013']],
        'PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider' => [['014']],
        'PHPStan\Cache\Cache' => [['015']],
        'PHPStan\Collectors\Collector' => [
            ['016', '017', '0590', '0591', '0592', '0593', '0594', '0595', '0596', '0598', '0599', '0601'],
            ['01062', '01063', '01064', '01065', '01066', '01067', '01068', '01069'],
        ],
        'PHPStan\Rules\Traits\UsedTraitFilesCollector' => [['016']],
        'PHPStan\Rules\Traits\TraitDeclarationCollector' => [['017']],
        'PHPStan\Rules\ClassForbiddenNameCheck' => [['018']],
        'PHPStan\Rules\ClassCaseSensitivityCheck' => [['019']],
        'PHPStan\Rules\Rule' => [
            [
                '020',
                '021',
                '022',
                '023',
                '024',
                '043',
                '053',
                '054',
                '055',
                '056',
                '057',
                '058',
                '059',
                '060',
                '061',
                '062',
                '0677',
                '0678',
                '0679',
                '0680',
                '0683',
                '0684',
                '0685',
                '0700',
                '0701',
                '0702',
                '0703',
                '0704',
                '0709',
                '0710',
                '0711',
                '0712',
                '0713',
                '0714',
                '0715',
                '0716',
                '0717',
                '0718',
                '0719',
                '0720',
                '0721',
                '0722',
                '0723',
                '0724',
                '0725',
                '0726',
                '0727',
                '0728',
                '01106',
                '01107',
            ],
            [
                '0738',
                '0739',
                '0740',
                '0741',
                '0742',
                '0743',
                '0744',
                '0745',
                '0746',
                '0747',
                '0748',
                '0749',
                '0750',
                '0751',
                '0752',
                '0753',
                '0754',
                '0755',
                '0756',
                '0757',
                '0758',
                '0759',
                '0760',
                '0761',
                '0762',
                '0763',
                '0764',
                '0765',
                '0766',
                '0767',
                '0768',
                '0769',
                '0770',
                '0771',
                '0772',
                '0773',
                '0774',
                '0775',
                '0776',
                '0777',
                '0778',
                '0779',
                '0780',
                '0781',
                '0782',
                '0783',
                '0784',
                '0785',
                '0786',
                '0787',
                '0788',
                '0789',
                '0790',
                '0791',
                '0792',
                '0793',
                '0794',
                '0795',
                '0796',
                '0797',
                '0798',
                '0799',
                '0800',
                '0801',
                '0802',
                '0803',
                '0804',
                '0805',
                '0806',
                '0807',
                '0808',
                '0809',
                '0810',
                '0811',
                '0812',
                '0813',
                '0814',
                '0815',
                '0816',
                '0817',
                '0818',
                '0819',
                '0820',
                '0821',
                '0822',
                '0823',
                '0824',
                '0825',
                '0826',
                '0827',
                '0828',
                '0829',
                '0830',
                '0831',
                '0832',
                '0833',
                '0834',
                '0835',
                '0836',
                '0837',
                '0838',
                '0839',
                '0840',
                '0841',
                '0842',
                '0843',
                '0844',
                '0845',
                '0846',
                '0847',
                '0848',
                '0849',
                '0850',
                '0851',
                '0852',
                '0853',
                '0854',
                '0855',
                '0856',
                '0857',
                '0858',
                '0859',
                '0860',
                '0861',
                '0862',
                '0863',
                '0864',
                '0865',
                '0866',
                '0867',
                '0868',
                '0869',
                '0870',
                '0871',
                '0872',
                '0873',
                '0874',
                '0875',
                '0876',
                '0877',
                '0878',
                '0879',
                '0880',
                '0881',
                '0882',
                '0883',
                '0884',
                '0885',
                '0886',
                '0887',
                '0888',
                '0889',
                '0890',
                '0891',
                '0892',
                '0893',
                '0894',
                '0895',
                '0896',
                '0897',
                '0898',
                '0899',
                '0900',
                '0901',
                '0902',
                '0903',
                '0904',
                '0905',
                '0906',
                '0907',
                '0908',
                '0909',
                '0910',
                '0911',
                '0912',
                '0913',
                '0914',
                '0915',
                '0916',
                '0917',
                '0918',
                '0919',
                '0920',
                '0921',
                '0922',
                '0923',
                '0924',
                '0925',
                '0926',
                '0927',
                '0928',
                '0929',
                '0930',
                '0931',
                '0932',
                '0933',
                '0934',
                '0935',
                '0936',
                '0937',
                '0938',
                '0939',
                '0940',
                '0941',
                '0942',
                '0943',
                '0944',
                '0945',
                '0946',
                '0947',
                '0948',
                '0949',
                '0950',
                '0951',
                '0952',
                '0953',
                '0954',
                '0955',
                '0956',
                '0957',
                '0958',
                '0959',
                '0960',
                '0961',
                '0962',
                '0963',
                '0964',
                '0965',
                '0966',
                '0967',
                '0968',
                '0969',
                '0970',
                '0971',
                '0972',
                '0973',
                '0974',
                '0975',
                '0976',
                '0977',
                '0978',
                '0979',
                '0980',
                '0981',
                '0982',
                '0983',
                '0984',
                '0985',
                '0986',
                '0987',
                '0988',
                '0989',
                '0990',
                '0991',
                '0992',
                '0993',
                '0994',
                '0995',
                '0996',
                '0997',
                '0998',
                '0999',
                '01000',
                '01001',
                '01002',
                '01003',
                '01004',
                '01005',
                '01006',
                '01007',
                '01008',
                '01009',
                '01010',
                '01011',
                '01012',
                '01013',
                '01014',
                '01015',
                '01016',
                '01017',
                '01018',
                '01019',
                '01020',
                '01021',
                '01022',
                '01023',
                '01024',
                '01025',
                '01026',
                '01027',
                '01028',
                '01029',
                '01030',
                '01031',
                '01032',
                '01033',
                '01034',
                '01035',
                '01036',
                '01037',
                '01038',
                '01039',
                '01040',
                '01041',
                '01042',
                '01043',
                '01044',
                '01045',
                '01046',
                '01047',
                '01048',
                '01049',
                '01050',
                '01051',
                '01052',
                '01053',
                '01054',
                '01055',
                '01056',
                '01057',
                '01058',
                '01059',
                '01060',
                '01061',
            ],
        ],
        'PHPStan\Rules\Debug\DumpNativeTypeRule' => [['020']],
        'PHPStan\Rules\Debug\FileAssertRule' => [['021']],
        'PHPStan\Rules\Debug\DumpTypeRule' => [['022']],
        'PHPStan\Rules\Debug\DebugScopeRule' => [['023']],
        'PHPStan\Rules\Debug\DumpPhpDocTypeRule' => [['024']],
        'PHPStan\Rules\Comparison\ConstantConditionRuleHelper' => [['025']],
        'PHPStan\Rules\Comparison\FunctionCallConstantConditionHelper' => [['026']],
        'PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper' => [['027']],
        'PHPStan\Rules\Comparison\ConstantConditionInTraitHelper' => [['028']],
        'PHPStan\Rules\AttributesCheck' => [['029']],
        'PHPStan\Rules\Variables\ParameterOutTypeCheck' => [['030']],
        'PHPStan\Rules\Playground\NeverRuleHelper' => [['031']],
        'PHPStan\Rules\Constants\OverrideAttributeOnClassConstantCheck' => [['032']],
        'PHPStan\Rules\InternalTag\RestrictedInternalUsageHelper' => [['033']],
        'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck' => [['034']],
        'PHPStan\Rules\Generics\GenericAncestorsCheck' => [['035']],
        'PHPStan\Rules\Generics\VarianceCheck' => [['036']],
        'PHPStan\Rules\Generics\CrossCheckInterfacesHelper' => [['037']],
        'PHPStan\Rules\Generics\MethodTagTemplateTypeCheck' => [['038']],
        'PHPStan\Rules\Generics\GenericObjectTypeCheck' => [['039']],
        'PHPStan\Rules\Generics\TemplateTypeCheck' => [['040']],
        'PHPStan\Rules\RuleLevelHelper' => [['041']],
        'PHPStan\Rules\Methods\MethodParameterComparisonHelper' => [['042']],
        'PHPStan\Rules\Methods\MethodSignatureRule' => [['043']],
        'PHPStan\Rules\Methods\ParentMethodHelper' => [['044']],
        'PHPStan\Rules\Methods\MethodVisibilityComparisonHelper' => [['045']],
        'PHPStan\Rules\Methods\MethodPrototypeFinder' => [['046']],
        'PHPStan\Rules\Methods\StaticMethodCallCheck' => [['047']],
        'PHPStan\Rules\Methods\OverridingMethodCheck' => [['048']],
        'PHPStan\Rules\Methods\MethodCallCheck' => [['049']],
        'PHPStan\Rules\ParameterClosureTypeHelper' => [['050']],
        'PHPStan\Rules\Registry' => [['registry']],
        'PHPStan\Rules\NullsafeCheck' => [['051']],
        'PHPStan\Rules\FunctionDefinitionCheck' => [['052']],
        'PHPStan\Rules\RestrictedUsage\RestrictedStaticPropertyUsageRule' => [['053']],
        'PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodUsageRule' => [['054']],
        'PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageRule' => [['055']],
        'PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageRule' => [['056']],
        'PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodCallableUsageRule' => [['057']],
        'PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageRule' => [['058']],
        'PHPStan\Rules\RestrictedUsage\RestrictedUsageOfDeprecatedStringCastRule' => [['059']],
        'PHPStan\Rules\RestrictedUsage\RestrictedFunctionCallableUsageRule' => [['060']],
        'PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageRule' => [['061']],
        'PHPStan\Rules\RestrictedUsage\RestrictedMethodCallableUsageRule' => [['062']],
        'PHPStan\Rules\Exceptions\TooWideThrowTypeCheck' => [['063']],
        'PHPStan\Rules\Exceptions\ExceptionTypeResolver' => [1 => ['064'], [1 => 'exceptionTypeResolver']],
        'PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver' => [['064']],
        'PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck' => [['065']],
        'PHPStan\Rules\ClassNameCheck' => [['066']],
        'PHPStan\Rules\MissingTypehintCheck' => [['067']],
        'PHPStan\Rules\UnusedParametersCheck' => [['068']],
        'PHPStan\Rules\Pure\FunctionPurityCheck' => [['069']],
        'PHPStan\Rules\DeadCode\PossiblyPureCallTransitivePurityResolver' => [['070']],
        'PHPStan\Rules\FunctionCallParametersCheck' => [['071']],
        'PHPStan\Rules\TooWideTypehints\TooWideParameterOutTypeCheck' => [['072']],
        'PHPStan\Rules\TooWideTypehints\TooWideTypeCheck' => [['073']],
        'PHPStan\Rules\NonStringableDynamicAccessCheck' => [['074']],
        'PHPStan\Rules\IssetCheck' => [['075']],
        'PHPStan\Rules\Classes\PropertyTagCheck' => [['076']],
        'PHPStan\Rules\Classes\LocalTypeAliasesCheck' => [['077']],
        'PHPStan\Rules\Classes\DuplicateDeclarationHelper' => [['078']],
        'PHPStan\Rules\Classes\MethodTagCheck' => [['079']],
        'PHPStan\Rules\Classes\ConsistentConstructorHelper' => [['080']],
        'PHPStan\Rules\Classes\MixinCheck' => [['081']],
        'PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeCheck' => [['082']],
        'PHPStan\Rules\PhpDoc\UnresolvableTypeHelper' => [['083']],
        'PHPStan\Rules\PhpDoc\AssertRuleHelper' => [['084']],
        'PHPStan\Rules\PhpDoc\VarTagTypeRuleHelper' => [['085']],
        'PHPStan\Rules\PhpDoc\ConditionalReturnTypeRuleHelper' => [['086']],
        'PHPStan\Rules\PhpDoc\RequireExtendsCheck' => [['087']],
        'PHPStan\Rules\PhpDoc\GenericCallableRuleHelper' => [['088']],
        'PHPStan\Rules\RestrictedUsage\RestrictedClassNameUsageExtension' => [['089', '093', '01092']],
        'PHPStan\Rules\Api\ApiClassNameUsageExtension' => [['089']],
        'PHPStan\Rules\Api\ApiRuleHelper' => [['090']],
        'PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageExtension' => [['091', '01095']],
        'PHPStan\Rules\Api\ApiMethodUsageExtension' => [['091']],
        'PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageExtension' => [['092', '01093']],
        'PHPStan\Rules\Api\RuntimeReflectionFunctionUsageExtension' => [['092']],
        'PHPStan\Rules\Api\RuntimeReflectionInstantiationUsageExtension' => [['093']],
        'PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageExtension' => [['094', '01091']],
        'PHPStan\Rules\Api\ApiClassConstantUsageExtension' => [['094']],
        'PHPStan\Rules\Properties\AccessStaticPropertiesCheck' => [['095']],
        'PHPStan\Rules\Properties\PropertyReflectionFinder' => [['096']],
        'PHPStan\Rules\Properties\AccessPropertiesCheck' => [['097']],
        'PHPStan\Rules\Properties\PropertyDescriptor' => [['098']],
        'PHPStan\Rules\ParameterCastableToStringCheck' => [['099']],
        'PHPStan\Rules\FunctionReturnTypeCheck' => [['0100']],
        'PHPStan\Collectors\Registry' => [['0101']],
        'PHPStan\Collectors\RegistryFactory' => [['0102']],
        'PHPStan\Neon\Printer' => [['0103']],
        'PHPStan\Command\BootstrapFilesRunner' => [['0104']],
        'PHPStan\Command\AnalyserRunner' => [['0105']],
        'PHPStan\Command\AnalyseApplication' => [['0106']],
        'PHPStan\Command\ErrorFormatter\ErrorFormatter' => [
            [
                'errorFormatter.table',
                'errorFormatter.junit',
                'errorFormatter.github',
                'errorFormatter.teamcity',
                'errorFormatter.raw',
                'errorFormatter.checkstyle',
                'errorFormatter.gitlab',
                'errorFormatter.json',
                'errorFormatter.prettyJson',
            ],
            ['0107'],
        ],
        'PHPStan\Command\ErrorFormatter\TableErrorFormatter' => [['errorFormatter.table']],
        'PHPStan\Command\ErrorFormatter\JunitErrorFormatter' => [['errorFormatter.junit']],
        'PHPStan\Command\ErrorFormatter\GithubErrorFormatter' => [['errorFormatter.github']],
        'PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter' => [['errorFormatter.teamcity']],
        'PHPStan\Command\ErrorFormatter\RawErrorFormatter' => [['errorFormatter.raw']],
        'PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter' => [['errorFormatter.checkstyle']],
        'PHPStan\Command\ErrorFormatter\CiDetectedErrorFormatter' => [['0107']],
        'PHPStan\Command\ErrorFormatter\GitlabErrorFormatter' => [['errorFormatter.gitlab']],
        'PHPStan\Command\FixerApplication' => [['0108']],
        'PHPStan\Command\FixerWorkerRunner' => [['0109']],
        'PHPStan\Command\Neon2Attributes\PhpClassAttributesWriter' => [['0110']],
        'PHPStan\Command\Neon2Attributes\Neon2AttributesMigrator' => [['0111']],
        'PHPStan\Turbo\TurboDiagnoseExtension' => [['0112']],
        'PHPStan\Fixable\ErrorFixer' => [['0113']],
        'PHPStan\Fixable\Patcher' => [['0114']],
        'PHPStan\Fixable\PhpDoc\PhpDocEditor' => [['0115']],
        'PHPStan\Internal\HttpClientFactory' => [['0116']],
        'PHPStan\Type\FileTypeMapper' => [0 => ['0117'], 2 => [1 => 'stubFileTypeMapper']],
        'PHPStan\Type\Regex\RegexExpressionHelper' => [['0118']],
        'PHPStan\Type\Regex\RegexGroupParser' => [['0119']],
        'PHPStan\Type\Constant\OversizedArrayBuilder' => [['0120']],
        'PHPStan\Type\BitwiseFlagHelper' => [['0121']],
        'PHPStan\Type\ClosureTypeFactory' => [['0122']],
        'PHPStan\Type\DynamicFunctionReturnTypeExtension' => [
            [
                '0123',
                '0124',
                '0125',
                '0130',
                '0131',
                '0132',
                '0133',
                '0137',
                '0141',
                '0142',
                '0143',
                '0146',
                '0147',
                '0148',
                '0151',
                '0152',
                '0154',
                '0155',
                '0158',
                '0159',
                '0162',
                '0166',
                '0170',
                '0171',
                '0175',
                '0177',
                '0180',
                '0181',
                '0186',
                '0187',
                '0188',
                '0189',
                '0190',
                '0191',
                '0198',
                '0199',
                '0200',
                '0201',
                '0202',
                '0203',
                '0205',
                '0206',
                '0208',
                '0209',
                '0211',
                '0212',
                '0213',
                '0217',
                '0218',
                '0219',
                '0221',
                '0224',
                '0225',
                '0226',
                '0227',
                '0228',
                '0229',
                '0231',
                '0233',
                '0234',
                '0235',
                '0240',
                '0241',
                '0242',
                '0244',
                '0245',
                '0246',
                '0248',
                '0249',
                '0250',
                '0251',
                '0252',
                '0253',
                '0258',
                '0259',
                '0261',
                '0262',
                '0266',
                '0267',
                '0268',
                '0269',
                '0271',
                '0272',
                '0273',
                '0274',
                '0275',
                '0277',
                '0278',
                '0279',
                '0281',
                '0284',
                '0285',
                '0290',
                '0294',
                '0295',
                '0298',
                '0299',
                '0300',
                '0302',
                '0304',
                '0305',
                '0307',
                '0310',
                '0313',
                '0315',
                '0316',
                '0318',
                '0320',
                '0321',
                '0322',
                '0327',
                '0328',
                '0329',
                '0331',
                '0333',
                '0646',
                '0653',
                '0654',
                '0655',
                '0656',
                '0657',
                '0658',
                '0659',
                '0660',
                '0661',
                '0662',
                '0675',
                '0707',
                '0708',
            ],
        ],
        'PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension' => [['0123']],
        'PHPStan\Type\Php\CountFunctionReturnTypeExtension' => [['0124']],
        'PHPStan\Type\Php\GetClassDynamicReturnTypeExtension' => [['0125']],
        'PHPStan\Type\Php\PrintfFormatParser' => [['0126']],
        'PHPStan\Type\Php\ConstantHelper' => [['0127']],
        'PHPStan\Type\Php\DateIntervalFormatReturnTypeHelper' => [['0128']],
        'PHPStan\Type\DynamicFunctionThrowTypeExtension' => [
            [
                '0129',
                '0134',
                '0144',
                '0153',
                '0163',
                '0164',
                '0183',
                '0195',
                '0220',
                '0222',
                '0236',
                '0239',
                '0270',
                '0291',
            ],
        ],
        'PHPStan\Type\Php\FilterFunctionsThrowTypeExtension' => [['0129']],
        'PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension' => [['0130']],
        'PHPStan\Type\Php\ArrayCountValuesDynamicReturnTypeExtension' => [['0131']],
        'PHPStan\Type\Php\OutputBufferingDynamicReturnTypeExtension' => [['0132']],
        'PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension' => [['0133']],
        'PHPStan\Type\Php\ArrayCombineFunctionThrowTypeExtension' => [['0134']],
        'PHPStan\Type\DynamicMethodReturnTypeExtension' => [
            [
                '0135',
                '0145',
                '0165',
                '0169',
                '0172',
                '0181',
                '0185',
                '0243',
                '0265',
                '0287',
                '0308',
                '0334',
                '0536',
                '0634',
                '0637',
                '0638',
                '0639',
                '0640',
                '0641',
                '0642',
                '0643',
                '0644',
                '0647',
                '0648',
                '0649',
                '0650',
                '0652',
                '0663',
                '0667',
                '0668',
                '0669',
                '0670',
                '0671',
                '0672',
                '0674',
                '0676',
                '0706',
                '01080',
                '01081',
                '01082',
                '01083',
                '01084',
                '01085',
                '01086',
                '01087',
                '01088',
                '01089',
                '01090',
                '01096',
                '01097',
                '01098',
                '01099',
                '01104',
                '01105',
            ],
        ],
        'PHPStan\Type\DynamicStaticMethodReturnTypeExtension' => [
            [
                '0135',
                '0138',
                '0174',
                '0182',
                '0192',
                '0237',
                '0292',
                '0311',
                '0326',
                '0631',
                '0632',
                '0635',
                '0636',
                '0645',
                '0651',
                '0664',
                '0665',
                '0666',
                '0673',
                '0705',
            ],
        ],
        'PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension' => [['0135']],
        'PHPStan\Type\Php\ArrayColumnHelper' => [['0136']],
        'PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension' => [['0137']],
        'PHPStan\Type\Php\ClosureGetCurrentDynamicReturnTypeExtension' => [['0138']],
        'PHPStan\Type\FunctionTypeSpecifyingExtension' => [
            [
                '0139',
                '0140',
                '0150',
                '0156',
                '0160',
                '0194',
                '0197',
                '0204',
                '0207',
                '0210',
                '0215',
                '0232',
                '0254',
                '0264',
                '0280',
                '0282',
                '0283',
                '0289',
                '0303',
                '0309',
                '0317',
                '0330',
                '01100',
                '01101',
                '01102',
                '01103',
            ],
        ],
        'PHPStan\Analyser\TypeSpecifierAwareExtension' => [
            [
                '0139',
                '0140',
                '0150',
                '0156',
                '0160',
                '0194',
                '0197',
                '0204',
                '0207',
                '0210',
                '0215',
                '0232',
                '0254',
                '0263',
                '0264',
                '0280',
                '0282',
                '0283',
                '0289',
                '0303',
                '0309',
                '0317',
                '0330',
                '01100',
                '01101',
                '01102',
                '01103',
            ],
        ],
        'PHPStan\Type\Php\FloatClassFunctionTypeSpecifyingExtension' => [['0139']],
        'PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension' => [['0140']],
        'PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension' => [['0141']],
        'PHPStan\Type\Php\OpensslCipherFunctionsReturnTypeExtension' => [['0142']],
        'PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension' => [['0143']],
        'PHPStan\Type\Php\StrSplitFunctionThrowTypeExtension' => [['0144']],
        'PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension' => [['0145']],
        'PHPStan\Type\Php\GetDefinedVarsFunctionReturnTypeExtension' => [['0146']],
        'PHPStan\Type\Php\AbsFunctionDynamicReturnTypeExtension' => [['0147']],
        'PHPStan\Type\Php\ArrayIntersectKeyFunctionReturnTypeExtension' => [['0148']],
        'PHPStan\Type\DynamicMethodThrowTypeExtension' => [['0149', '0168', '0257', '0306']],
        'PHPStan\Type\Php\DateTimeSubMethodThrowTypeExtension' => [['0149']],
        'PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension' => [['0150']],
        'PHPStan\Type\Php\ArrayChunkFunctionReturnTypeExtension' => [['0151']],
        'PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension' => [['0152']],
        'PHPStan\Type\Php\TriggerErrorFunctionThrowTypeExtension' => [['0153']],
        'PHPStan\Type\Php\TrimFunctionDynamicReturnTypeExtension' => [['0154']],
        'PHPStan\Type\Php\PgLastNoticeDynamicReturnTypeExtension' => [['0155']],
        'PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension' => [['0156']],
        'PHPStan\Type\Php\TrimCharactersHelper' => [['0157']],
        'PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension' => [['0158']],
        'PHPStan\Type\Php\FloatClassFunctionReturnTypeExtension' => [['0159']],
        'PHPStan\Type\Php\SetTypeFunctionTypeSpecifyingExtension' => [['0160']],
        'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeHelper' => [['0161']],
        'PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension' => [['0162']],
        'PHPStan\Type\Php\JsonThrowTypeExtension' => [['0163']],
        'PHPStan\Type\Php\AssertThrowTypeExtension' => [['0164']],
        'PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension' => [['0165']],
        'PHPStan\Type\Php\GettypeFunctionReturnTypeExtension' => [['0166']],
        'PHPStan\Type\DynamicStaticMethodThrowTypeExtension' => [
            ['0167', '0193', '0196', '0230', '0255', '0256', '0288', '0301', '0314', '0332'],
        ],
        'PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension' => [['0167']],
        'PHPStan\Type\Php\DomDocumentCreateElementDynamicThrowTypeExtension' => [['0168']],
        'PHPStan\Type\Php\RandomizerMethodReturnTypeExtension' => [['0169']],
        'PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension' => [['0170']],
        'PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension' => [['0171']],
        'PHPStan\Type\Php\DomDocumentCreateElementDynamicReturnTypeExtension' => [['0172']],
        'PHPStan\Reflection\PropertiesClassReflectionExtension' => [
            ['0173', '0509', '0518', '0520', '0621', '0624', '0626', '0628'],
        ],
        'PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension' => [['0173']],
        'PHPStan\Type\Php\BackedEnumFromMethodDynamicReturnTypeExtension' => [['0174']],
        'PHPStan\Type\Php\GetDebugTypeFunctionReturnTypeExtension' => [['0175']],
        'PHPStan\Type\Php\FilterFunctionReturnTypeHelper' => [['0176']],
        'PHPStan\Type\Php\DateFunctionReturnTypeExtension' => [['0177']],
        'PHPStan\Analyser\ResultCache\ResultCacheValueExtension' => [['0178', '0494', '0496', '0497', '0498', '0499']],
        'PHPStan\Type\Php\OpenSslCipherMethodsProvider' => [['0178']],
        'PHPStan\Type\OperatorTypeSpecifyingExtension' => [['0179', '0324']],
        'PHPStan\Type\Php\GmpOperatorTypeSpecifyingExtension' => [['0179']],
        'PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension' => [['0180']],
        'PHPStan\Type\Php\StatDynamicReturnTypeExtension' => [['0181']],
        'PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension' => [['0182']],
        'PHPStan\Type\Php\ArrayChunkFunctionThrowTypeExtension' => [['0183']],
        'PHPStan\Type\Php\IdateFunctionReturnTypeHelper' => [['0184']],
        'PHPStan\Type\Php\DateIntervalFormatDynamicReturnTypeExtension' => [['0185']],
        'PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension' => [['0186']],
        'PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension' => [['0187']],
        'PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension' => [['0188']],
        'PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension' => [['0189']],
        'PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension' => [['0190']],
        'PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension' => [['0191']],
        'PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension' => [['0192']],
        'PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension' => [['0193']],
        'PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension' => [['0194']],
        'PHPStan\Type\Php\VersionCompareFunctionDynamicThrowTypeExtension' => [['0195']],
        'PHPStan\Type\Php\DateTimeZoneConstructorThrowTypeExtension' => [['0196']],
        'PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension' => [['0197']],
        'PHPStan\Type\Php\LocaltimeFunctionDynamicReturnTypeExtension' => [['0198']],
        'PHPStan\Type\Php\ClassImplementsFunctionReturnTypeExtension' => [['0199']],
        'PHPStan\Type\Php\StrCaseFunctionsReturnTypeExtension' => [['0200']],
        'PHPStan\Type\Php\MbFunctionsReturnTypeExtension' => [['0201']],
        'PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension' => [['0202']],
        'PHPStan\Type\Php\FmodFunctionReturnTypeExtension' => [['0203']],
        'PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension' => [['0204']],
        'PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension' => [['0205']],
        'PHPStan\Type\Php\FilterInputDynamicReturnTypeExtension' => [['0206']],
        'PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension' => [['0207']],
        'PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension' => [['0208']],
        'PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension' => [['0209']],
        'PHPStan\Type\Php\StrlenFunctionTypeSpecifyingExtension' => [['0210']],
        'PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension' => [['0211']],
        'PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension' => [['0212']],
        'PHPStan\Type\Php\SubstrDynamicReturnTypeExtension' => [['0213']],
        'PHPStan\Type\FunctionParameterClosureTypeExtension' => [['0214', '0223', '0297', '0319', '0323']],
        'PHPStan\Type\Php\ArrayWalkParameterClosureTypeExtension' => [['0214']],
        'PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension' => [['0215']],
        'PHPStan\Type\FunctionParameterOutTypeExtension' => [['0216', '0238', '0276']],
        'PHPStan\Type\Php\ParseStrParameterOutTypeExtension' => [['0216']],
        'PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension' => [['0217']],
        'PHPStan\Type\Php\ArrayFindFunctionReturnTypeExtension' => [['0218']],
        'PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension' => [['0219']],
        'PHPStan\Type\Php\MinMaxFunctionThrowTypeExtension' => [['0220']],
        'PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension' => [['0221']],
        'PHPStan\Type\Php\IntdivThrowTypeExtension' => [['0222']],
        'PHPStan\Type\Php\ArrayFilterParameterClosureTypeExtension' => [['0223']],
        'PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension' => [['0224']],
        'PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension' => [['0225']],
        'PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension' => [['0226']],
        'PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension' => [['0227']],
        'PHPStan\Type\Php\ClampFunctionReturnTypeExtension' => [['0228']],
        'PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension' => [['0229']],
        'PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension' => [['0230']],
        'PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension' => [['0231']],
        'PHPStan\Type\Php\ArraySearchFunctionTypeSpecifyingExtension' => [['0232']],
        'PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension' => [['0233']],
        'PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension' => [['0234']],
        'PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension' => [['0235']],
        'PHPStan\Type\Php\GetClassFunctionThrowTypeExtension' => [['0236']],
        'PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension' => [['0237']],
        'PHPStan\Type\Php\OpenSslEncryptParameterOutTypeExtension' => [['0238']],
        'PHPStan\Type\Php\RoundFunctionThrowTypeExtension' => [['0239']],
        'PHPStan\Type\Php\HighlightStringDynamicReturnTypeExtension' => [['0240']],
        'PHPStan\Type\Php\SscanfFunctionDynamicReturnTypeExtension' => [['0241']],
        'PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension' => [['0242']],
        'PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension' => [['0243']],
        'PHPStan\Type\Php\FilterVarArrayDynamicReturnTypeExtension' => [['0244']],
        'PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension' => [['0245']],
        'PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension' => [['0246']],
        'PHPStan\Type\UnaryOperatorTypeSpecifyingExtension' => [['0247', '0296']],
        'PHPStan\Type\Php\BcMathNumberUnaryOperatorTypeSpecifyingExtension' => [['0247']],
        'PHPStan\Type\Php\IntdivFunctionReturnTypeExtension' => [['0248']],
        'PHPStan\Type\Php\RoundFunctionReturnTypeExtension' => [['0249']],
        'PHPStan\Type\Php\StrlenFunctionReturnTypeExtension' => [['0250']],
        'PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension' => [['0251']],
        'PHPStan\Type\Php\SqrtFunctionReturnTypeExtension' => [['0252']],
        'PHPStan\Type\Php\ArrayFirstLastDynamicReturnTypeExtension' => [['0253']],
        'PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension' => [['0254']],
        'PHPStan\Type\Php\DateIntervalCreateFromDateStringThrowTypeExtension' => [['0255']],
        'PHPStan\Type\Php\ReflectionClassConstantConstructorThrowTypeExtension' => [['0256']],
        'PHPStan\Type\Php\DateTimeModifyMethodThrowTypeExtension' => [['0257']],
        'PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension' => [['0258']],
        'PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension' => [['0259']],
        'PHPStan\Type\Php\FilterFunctionFlagsHelper' => [['0260']],
        'PHPStan\Type\Php\ArrayReplaceFunctionReturnTypeExtension' => [['0261']],
        'PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension' => [['0262']],
        'PHPStan\Type\MethodTypeSpecifyingExtension' => [['0263']],
        'PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension' => [['0263']],
        'PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension' => [['0264']],
        'PHPStan\Type\Php\ThrowableReturnTypeExtension' => [['0265']],
        'PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension' => [['0266']],
        'PHPStan\Type\Php\IdateFunctionReturnTypeExtension' => [['0267']],
        'PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension' => [['0268']],
        'PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension' => [['0269']],
        'PHPStan\Type\Php\UnserializeFunctionThrowTypeExtension' => [['0270']],
        'PHPStan\Type\Php\IniGetReturnTypeExtension' => [['0271']],
        'PHPStan\Type\Php\StrrevFunctionReturnTypeExtension' => [['0272']],
        'PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension' => [['0273']],
        'PHPStan\Type\Php\DateIntervalFormatFunctionReturnTypeExtension' => [['0274']],
        'PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension' => [['0275']],
        'PHPStan\Type\Php\PregMatchParameterOutTypeExtension' => [['0276']],
        'PHPStan\Type\Php\StrIncrementDecrementFunctionReturnTypeExtension' => [['0277']],
        'PHPStan\Type\Php\PgDmlDynamicReturnTypeExtension' => [['0278']],
        'PHPStan\Type\Php\CountCharsFunctionDynamicReturnTypeExtension' => [['0279']],
        'PHPStan\Type\Php\PregMatchTypeSpecifyingExtension' => [['0280']],
        'PHPStan\Type\Php\ArrayChangeKeyCaseFunctionReturnTypeExtension' => [['0281']],
        'PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension' => [['0282']],
        'PHPStan\Type\Php\StrContainingTypeSpecifyingExtension' => [['0283']],
        'PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension' => [['0284']],
        'PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension' => [['0285']],
        'PHPStan\Type\Php\RegexArrayShapeMatcher' => [['0286']],
        'PHPStan\Type\Php\DsMapDynamicReturnTypeExtension' => [['0287']],
        'PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension' => [['0288']],
        'PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension' => [['0289']],
        'PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension' => [['0290']],
        'PHPStan\Type\Php\PrintfFunctionThrowTypeExtension' => [['0291']],
        'PHPStan\Type\Php\ArrayObjectConstructorReturnTypeExtension' => [['0292']],
        'PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper' => [['0293']],
        'PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension' => [['0294']],
        'PHPStan\Type\Php\HashFunctionsReturnTypeExtension' => [['0295']],
        'PHPStan\Type\Php\GmpUnaryOperatorTypeSpecifyingExtension' => [['0296']],
        'PHPStan\Type\Php\ArrayMapParameterClosureTypeExtension' => [['0297']],
        'PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension' => [['0298']],
        'PHPStan\Type\Php\CurlGetinfoFunctionDynamicReturnTypeExtension' => [['0299']],
        'PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension' => [['0300']],
        'PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension' => [['0301']],
        'PHPStan\Type\Php\ArrayFindKeyFunctionReturnTypeExtension' => [['0302']],
        'PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension' => [['0303']],
        'PHPStan\Type\Php\PgResultStatusDynamicReturnTypeExtension' => [['0304']],
        'PHPStan\Type\Php\StrPadFunctionReturnTypeExtension' => [['0305']],
        'PHPStan\Type\Php\DsMapDynamicMethodThrowTypeExtension' => [['0306']],
        'PHPStan\Type\Php\ArrayPadDynamicReturnTypeExtension' => [['0307']],
        'PHPStan\Type\Php\DateFormatMethodReturnTypeExtension' => [['0308']],
        'PHPStan\Type\Php\CtypeDigitFunctionTypeSpecifyingExtension' => [['0309']],
        'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeExtension' => [['0310']],
        'PHPStan\Type\Php\DateIntervalDynamicReturnTypeExtension' => [['0311']],
        'PHPStan\Type\Php\ArrayCombineHelper' => [['0312']],
        'PHPStan\Type\Php\MbStrlenFunctionReturnTypeExtension' => [['0313']],
        'PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension' => [['0314']],
        'PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension' => [['0315']],
        'PHPStan\Type\Php\StrShuffleFunctionReturnTypeExtension' => [['0316']],
        'PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension' => [['0317']],
        'PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension' => [['0318']],
        'PHPStan\Type\Php\PregReplaceCallbackClosureTypeExtension' => [['0319']],
        'PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension' => [['0320']],
        'PHPStan\Type\Php\ConstantFunctionReturnTypeExtension' => [['0321']],
        'PHPStan\Type\Php\PowFunctionReturnTypeExtension' => [['0322']],
        'PHPStan\Type\Php\ArrayFindParameterClosureTypeExtension' => [['0323']],
        'PHPStan\Type\Php\BcMathNumberOperatorTypeSpecifyingExtension' => [['0324']],
        'PHPStan\Type\Php\DateFunctionReturnTypeHelper' => [['0325']],
        'PHPStan\Type\Php\PDOConnectReturnTypeExtension' => [['0326']],
        'PHPStan\Type\Php\DateTimeCreateDynamicReturnTypeExtension' => [['0327']],
        'PHPStan\Type\Php\CompactFunctionReturnTypeExtension' => [['0328']],
        'PHPStan\Type\Php\RangeFunctionReturnTypeExtension' => [['0329']],
        'PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension' => [['0330']],
        'PHPStan\Type\Php\LtrimFunctionReturnTypeExtension' => [['0331']],
        'PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension' => [['0332']],
        'PHPStan\Type\Php\StrTokFunctionReturnTypeExtension' => [['0333']],
        'PHPStan\Type\PHPStan\ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension' => [['0334']],
        'PHPStan\Type\DynamicReturnTypeExtensionRegistry' => [['0335']],
        'PHPStan\Type\ArrayUnpackingHelper' => [['0336']],
        'PHPStan\Type\OperatorTypeSpecifyingExtensionRegistry' => [['0337']],
        'PHPStan\Type\TypeAliasResolverProvider' => [['0338']],
        'PHPStan\Type\TypeAliasResolver' => [['0339']],
        'PHPStan\Type\UnaryOperatorTypeSpecifyingExtensionRegistry' => [['0340']],
        'PHPStan\File\IncludedFilePathResolver' => [['0341']],
        'PHPStan\File\FileMonitorFactory' => [['0342']],
        'PHPStan\File\FileHelper' => [['0343']],
        'PHPStan\File\DirectoryWalker' => [['0344']],
        'PHPStan\File\FileMonitor' => [['0345']],
        'PHPStan\File\HashingFileMonitor' => [['0345']],
        'PHPStan\File\RelativePathHelper' => [
            0 => ['relativePathHelper'],
            2 => [1 => 'parentDirectoryRelativePathHelper', 'simpleRelativePathHelper'],
        ],
        'PHPStan\File\FileContentHasher' => [['0346']],
        'PHPStan\File\DeduplicatingFileReader' => [['0347']],
        'PHPStan\File\FileStatSignatures' => [['0348']],
        'PHPStan\File\FileExcluderFactory' => [['0349']],
        'PHPStan\Analyser\ExprHandler' => [
            [
                '0350',
                '0351',
                '0352',
                '0353',
                '0354',
                '0355',
                '0356',
                '0357',
                '0358',
                '0359',
                '0360',
                '0361',
                '0362',
                '0363',
                '0364',
                '0365',
                '0366',
                '0367',
                '0368',
                '0369',
                '0370',
                '0371',
                '0372',
                '0373',
                '0374',
                '0375',
                '0376',
                '0377',
                '0378',
                '0379',
                '0380',
                '0401',
                '0402',
                '0403',
                '0404',
                '0405',
                '0406',
                '0407',
                '0408',
                '0409',
                '0410',
                '0411',
                '0412',
                '0413',
                '0414',
                '0415',
                '0416',
                '0417',
                '0418',
                '0419',
                '0420',
                '0421',
                '0422',
                '0423',
                '0424',
                '0425',
                '0426',
                '0427',
                '0428',
                '0429',
                '0430',
            ],
        ],
        'PHPStan\Analyser\ExprHandler\BooleanNotHandler' => [['0350']],
        'PHPStan\Analyser\ExprHandler\ShellExecHandler' => [['0351']],
        'PHPStan\Analyser\ExprHandler\EmptyHandler' => [['0352']],
        'PHPStan\Analyser\ExprHandler\PreIncHandler' => [['0353']],
        'PHPStan\Analyser\ExprHandler\AssignHandler' => [['0354']],
        'PHPStan\Analyser\PerFileAnalysisResettable' => [['0355', '0360', '0384', '0398']],
        'PHPStan\Analyser\ExprHandler\MatchHandler' => [['0355']],
        'PHPStan\Analyser\ExprHandler\PostDecHandler' => [['0356']],
        'PHPStan\Analyser\ExprHandler\NullsafePropertyFetchHandler' => [['0357']],
        'PHPStan\Analyser\ExprHandler\ArrayDimFetchHandler' => [['0358']],
        'PHPStan\Analyser\ExprHandler\ExitHandler' => [['0359']],
        'PHPStan\Analyser\ExprHandler\TernaryHandler' => [['0360']],
        'PHPStan\Analyser\ExprHandler\UnaryMinusHandler' => [['0361']],
        'PHPStan\Analyser\ExprHandler\ClosureHandler' => [['0362']],
        'PHPStan\Analyser\ExprHandler\InstanceofHandler' => [['0363']],
        'PHPStan\Analyser\ExprHandler\PipeHandler' => [['0364']],
        'PHPStan\Analyser\ExprHandler\YieldFromHandler' => [['0365']],
        'PHPStan\Analyser\ExprHandler\IncludeHandler' => [['0366']],
        'PHPStan\Analyser\ExprHandler\CoalesceHandler' => [['0367']],
        'PHPStan\Analyser\ExprHandler\Virtual\NativeTypeExprHandler' => [['0368']],
        'PHPStan\Analyser\ExprHandler\Virtual\TypeExprHandler' => [['0369']],
        'PHPStan\Analyser\ExprHandler\Virtual\InstantiationCallableNodeHandler' => [['0370']],
        'PHPStan\Analyser\ExprHandler\Virtual\MethodCallableNodeHandler' => [['0371']],
        'PHPStan\Analyser\ExprHandler\Virtual\UnsetOffsetExprHandler' => [['0372']],
        'PHPStan\Analyser\ExprHandler\Virtual\StaticMethodCallableNodeHandler' => [['0373']],
        'PHPStan\Analyser\ExprHandler\Virtual\FunctionCallableNodeHandler' => [['0374']],
        'PHPStan\Analyser\ExprHandler\Virtual\AlwaysRememberedExprHandler' => [['0375']],
        'PHPStan\Analyser\ExprHandler\Virtual\SetOffsetValueTypeExprHandler' => [['0376']],
        'PHPStan\Analyser\ExprHandler\Virtual\IssetExprHandler' => [['0377']],
        'PHPStan\Analyser\ExprHandler\Virtual\SetExistingOffsetValueTypeExprHandler' => [['0378']],
        'PHPStan\Analyser\ExprHandler\Virtual\ExistingArrayDimFetchHandler' => [['0379']],
        'PHPStan\Analyser\ExprHandler\ArrayHandler' => [['0380']],
        'PHPStan\Analyser\ExprHandler\Helper\IdenticalNarrowingHelper' => [['0381']],
        'PHPStan\Analyser\ExprHandler\Helper\FuncCallScopeEffectsHelper' => [['0382']],
        'PHPStan\Analyser\ExprHandler\Helper\ImplicitToStringCallHelper' => [['0383']],
        'PHPStan\Analyser\ExprHandler\Helper\ClosureTypeResolver' => [['0384']],
        'PHPStan\Analyser\ExprHandler\Helper\ConditionalExpressionHolderHelper' => [['0385']],
        'PHPStan\Analyser\ExprHandler\Helper\CountNarrowingHelper' => [['0386']],
        'PHPStan\Analyser\ExprHandler\Helper\MethodThrowPointHelper' => [['0387']],
        'PHPStan\Analyser\ExprHandler\Helper\OutputBufferHelper' => [['0388']],
        'PHPStan\Analyser\ExprHandler\Helper\CoalesceCompositionHelper' => [['0389']],
        'PHPStan\Analyser\ExprHandler\Helper\IncDecTypeHelper' => [['0390']],
        'PHPStan\Analyser\ExprHandler\Helper\DynamicReturnTypeStoragePrimer' => [['0391']],
        'PHPStan\Analyser\ExprHandler\Helper\VirtualExprResultHelper' => [['0392']],
        'PHPStan\Analyser\ExprHandler\Helper\BooleanNarrowingHelper' => [['0393']],
        'PHPStan\Analyser\ExprHandler\Helper\ClosureParameterResolver' => [['0394']],
        'PHPStan\Analyser\ExprHandler\Helper\DefaultNarrowingHelper' => [['0395']],
        'PHPStan\Analyser\ExprHandler\Helper\ContextualClosureParameterResolver' => [['0396']],
        'PHPStan\Analyser\ExprHandler\Helper\EarlyTerminatingCallHelper' => [['0397']],
        'PHPStan\Analyser\ExprHandler\Helper\NonNullabilityHelper' => [['0398']],
        'PHPStan\Analyser\ExprHandler\Helper\MethodCallReturnTypeHelper' => [['0399']],
        'PHPStan\Analyser\ExprHandler\Helper\ForeachEmptyOrObjectNarrowingHelper' => [['0400']],
        'PHPStan\Analyser\ExprHandler\ClassConstFetchHandler' => [['0401']],
        'PHPStan\Analyser\ExprHandler\NullsafeMethodCallHandler' => [['0402']],
        'PHPStan\Analyser\ExprHandler\ErrorSuppressHandler' => [['0403']],
        'PHPStan\Analyser\ExprHandler\ScalarHandler' => [['0404']],
        'PHPStan\Analyser\ExprHandler\ArrowFunctionHandler' => [['0405']],
        'PHPStan\Analyser\ExprHandler\VariableHandler' => [['0406']],
        'PHPStan\Analyser\ExprHandler\BooleanAndHandler' => [['0407']],
        'PHPStan\Analyser\ExprHandler\StaticCallHandler' => [['0408']],
        'PHPStan\Analyser\ExprHandler\PreDecHandler' => [['0409']],
        'PHPStan\Analyser\ExprHandler\BooleanOrHandler' => [['0410']],
        'PHPStan\Analyser\ExprHandler\CastHandler' => [['0411']],
        'PHPStan\Analyser\ExprHandler\CloneHandler' => [['0412']],
        'PHPStan\Analyser\ExprHandler\InterpolatedStringHandler' => [['0413']],
        'PHPStan\Analyser\ExprHandler\BinaryOpHandler' => [['0414']],
        'PHPStan\Analyser\ExprHandler\EvalHandler' => [['0415']],
        'PHPStan\Analyser\ExprHandler\PostIncHandler' => [['0416']],
        'PHPStan\Analyser\ExprHandler\UnaryPlusHandler' => [['0417']],
        'PHPStan\Analyser\ExprHandler\ConstFetchHandler' => [['0418']],
        'PHPStan\Analyser\ExprHandler\StaticPropertyFetchHandler' => [['0419']],
        'PHPStan\Analyser\ExprHandler\MethodCallHandler' => [['0420']],
        'PHPStan\Analyser\ExprHandler\NewHandler' => [['0421']],
        'PHPStan\Analyser\ExprHandler\BitwiseNotHandler' => [['0422']],
        'PHPStan\Analyser\ExprHandler\PropertyFetchHandler' => [['0423']],
        'PHPStan\Analyser\ExprHandler\YieldHandler' => [['0424']],
        'PHPStan\Analyser\ExprHandler\FuncCallHandler' => [['0425']],
        'PHPStan\Analyser\ExprHandler\ThrowHandler' => [['0426']],
        'PHPStan\Analyser\ExprHandler\IssetHandler' => [['0427']],
        'PHPStan\Analyser\ExprHandler\PrintHandler' => [['0428']],
        'PHPStan\Analyser\ExprHandler\CastStringHandler' => [['0429']],
        'PHPStan\Analyser\ExprHandler\AssignOpHandler' => [['0430']],
        'PHPStan\Analyser\ConstantResolver' => [['0431']],
        'PHPStan\Analyser\VarAnnotationProcessor' => [['0432']],
        'PHPStan\Analyser\StmtHandler' => [
            [
                '0433',
                '0434',
                '0435',
                '0436',
                '0437',
                '0438',
                '0439',
                '0440',
                '0441',
                '0442',
                '0443',
                '0444',
                '0445',
                '0446',
                '0447',
                '0448',
                '0449',
                '0450',
                '0451',
                '0452',
                '0453',
                '0454',
                '0455',
                '0456',
                '0457',
                '0458',
                '0459',
                '0460',
                '0461',
                '0462',
                '0463',
                '0464',
            ],
        ],
        'PHPStan\Analyser\StmtHandler\WhileHandler' => [['0433']],
        'PHPStan\Analyser\StmtHandler\ExpressionHandler' => [['0434']],
        'PHPStan\Analyser\StmtHandler\TraitUseHandler' => [['0435']],
        'PHPStan\Analyser\StmtHandler\UnsetHandler' => [['0436']],
        'PHPStan\Analyser\StmtHandler\UseHandler' => [['0437']],
        'PHPStan\Analyser\StmtHandler\BlockHandler' => [['0438']],
        'PHPStan\Analyser\StmtHandler\GotoHandler' => [['0439']],
        'PHPStan\Analyser\StmtHandler\FunctionHandler' => [['0440']],
        'PHPStan\Analyser\StmtHandler\TryCatchHandler' => [['0441']],
        'PHPStan\Analyser\StmtHandler\NopHandler' => [['0442']],
        'PHPStan\Analyser\StmtHandler\ClassMethodHandler' => [['0443']],
        'PHPStan\Analyser\StmtHandler\EnumCaseHandler' => [['0444']],
        'PHPStan\Analyser\StmtHandler\ConstHandler' => [['0445']],
        'PHPStan\Analyser\StmtHandler\ForHandler' => [['0446']],
        'PHPStan\Analyser\StmtHandler\GlobalHandler' => [['0447']],
        'PHPStan\Analyser\StmtHandler\SwitchHandler' => [['0448']],
        'PHPStan\Analyser\StmtHandler\DeclareHandler' => [['0449']],
        'PHPStan\Analyser\StmtHandler\GroupUseHandler' => [['0450']],
        'PHPStan\Analyser\StmtHandler\PropertyHandler' => [['0451']],
        'PHPStan\Analyser\StmtHandler\EchoHandler' => [['0452']],
        'PHPStan\Analyser\StmtHandler\StaticVariableHandler' => [['0453']],
        'PHPStan\Analyser\StmtHandler\TraitHandler' => [['0454']],
        'PHPStan\Analyser\StmtHandler\NamespaceHandler' => [['0455']],
        'PHPStan\Analyser\StmtHandler\ReturnHandler' => [['0456']],
        'PHPStan\Analyser\StmtHandler\BreakContinueHandler' => [['0457']],
        'PHPStan\Analyser\StmtHandler\DoWhileHandler' => [['0458']],
        'PHPStan\Analyser\StmtHandler\LabelHandler' => [['0459']],
        'PHPStan\Analyser\StmtHandler\ClassConstHandler' => [['0460']],
        'PHPStan\Analyser\StmtHandler\InlineHtmlHandler' => [['0461']],
        'PHPStan\Analyser\StmtHandler\ClassLikeHandler' => [['0462']],
        'PHPStan\Analyser\StmtHandler\IfHandler' => [['0463']],
        'PHPStan\Analyser\StmtHandler\ForeachHandler' => [['0464']],
        'PHPStan\Analyser\PropertyHooksProcessor' => [['0465']],
        'PHPStan\Analyser\RuleErrorTransformer' => [['0466']],
        'PHPStan\Analyser\ScopeFactory' => [['0467']],
        'PHPStan\Analyser\LocalIgnoresProcessor' => [['0468']],
        'PHPStan\Analyser\CalledMethodProcessor' => [['0469']],
        'PHPStan\Analyser\TypeSpecifierFactory' => [['typeSpecifierFactory']],
        'PHPStan\Analyser\FileAnalyser' => [['0470']],
        'PHPStan\Analyser\ClosureProcessor' => [['0471']],
        'PHPStan\Analyser\Generics\ClosureSignatureInference' => [['0472']],
        'PHPStan\Analyser\Generics\TemplateArgumentObserver' => [['0473']],
        'PHPStan\Analyser\Generics\TemplateArgumentResolver' => [['0474']],
        'PHPStan\Analyser\Generics\StaticVariableInference' => [['0475']],
        'PHPStan\Analyser\DeclarationDependencyTracker' => [['0476']],
        'PHPStan\Analyser\StatementsHandler' => [['0477']],
        'PHPStan\Analyser\PropertyHookThrowPointsResolver' => [['0478']],
        'PHPStan\Analyser\RicherScopeGetTypeHelper' => [['0479']],
        'PHPStan\Analyser\DeprecatedAttributeResolver' => [['0480']],
        'PHPStan\Analyser\AnalyserResultFinalizer' => [['0481']],
        'PHPStan\Analyser\ParametersProcessor' => [['0482']],
        'PHPStan\Analyser\NodeScopeResolver' => [['0483']],
        'PHPStan\Analyser\ConstantResolverFactory' => [['0484']],
        'PHPStan\Analyser\AttributesHandler' => [['0485']],
        'PHPStan\Analyser\PhpDocsResolver' => [['0486']],
        'PHPStan\Analyser\ValueDependencyCollector' => [['0487']],
        'PHPStan\Analyser\ArgumentsHandler' => [['0488']],
        'PHPStan\Analyser\TypeSpecifier' => [['typeSpecifier']],
        'PHPStan\Analyser\Ignore\IgnoreLexer' => [['0489']],
        'PHPStan\Analyser\Ignore\LineIgnoreFixer' => [['0490']],
        'PHPStan\Analyser\Ignore\IgnoredErrorHelper' => [['0491']],
        'PHPStan\Analyser\Ignore\IgnoreErrorsConfigFixer' => [['0492']],
        'PHPStan\Analyser\Ignore\UnmatchedIgnoreFixer' => [['0493']],
        'PHPStan\Analyser\ResultCache\FunctionResultCacheValueExtension' => [['0494']],
        'PHPStan\Analyser\ResultCache\ResultCacheClearer' => [['0495']],
        'PHPStan\Analyser\ResultCache\FileResultCacheValueExtension' => [['0496']],
        'PHPStan\Analyser\ResultCache\ConstantResultCacheValueExtension' => [['0497']],
        'PHPStan\Analyser\ResultCache\ClassResultCacheValueExtension' => [['0498']],
        'PHPStan\Analyser\ResultCache\DirectoryResultCacheValueExtension' => [['0499']],
        'PHPStan\Analyser\Analyser' => [['0500']],
        'PHPStan\Reflection\SignatureMap\SignatureMapProvider' => [['0502'], ['0501', '0506']],
        'PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider' => [['0501']],
        'PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider' => [['0503']],
        'PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory' => [['0504']],
        'PHPStan\Reflection\SignatureMap\SignatureMapParser' => [['0505']],
        'PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider' => [['0506']],
        'PHPStan\Reflection\InitializerExprTypeResolver' => [['0507']],
        'PHPStan\Reflection\Php\PhpClassReflectionExtension' => [['0508']],
        'PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension' => [['0509']],
        'PHPStan\Reflection\MethodsClassReflectionExtension' => [
            [
                '0510',
                '0517',
                '0519',
                '0537',
                '0606',
                '0608',
                '0609',
                '0610',
                '0611',
                '0612',
                '0613',
                '0614',
                '0615',
                '0616',
                '0617',
                '0618',
                '0619',
                '0620',
                '01109',
            ],
        ],
        'PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension' => [['0510']],
        'PHPStan\Reflection\AllowedSubTypesClassReflectionExtension' => [['0511', '0512']],
        'PHPStan\Reflection\Php\SealedAllowedSubTypesClassReflectionExtension' => [['0511']],
        'PHPStan\Reflection\Php\EnumAllowedSubTypesClassReflectionExtension' => [['0512']],
        'PHPStan\Reflection\Deprecation\DeprecationProvider' => [['0513']],
        'PHPStan\Reflection\AttributeReflectionFactory' => [['0514']],
        'PHPStan\Reflection\ConstructorsHelper' => [['0515']],
        'PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory' => [['reflectionProviderFactory']],
        'PHPStan\Reflection\ReflectionProvider\ReflectionProviderProvider' => [['0516']],
        'PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension' => [['0517']],
        'PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension' => [['0518']],
        'PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension' => [['0519']],
        'PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension' => [['0520']],
        'PHPStan\Reflection\ParameterAllowedConstantsMapProvider' => [['0521']],
        'PHPStan\Reflection\BetterReflection\SourceStubber\ExtensionVersionProvider' => [['0522']],
        'PHPStan\Reflection\BetterReflection\SourceStubber\ReflectionSourceStubberFactory' => [['0523']],
        'PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory' => [['0524']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\PreForkDirectorySymbolScanner' => [['0525']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher' => [['0526']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository' => [['0527']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\BootstrapAutoloaderExceptionReporter' => [['0528']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\PhpFileCleaner' => [['0529']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository' => [['0530']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker' => [['0531']],
        'PhpParser\NodeVisitorAbstract' => [
            [
                '0532',
                '0556',
                '0557',
                '0558',
                '0559',
                '0560',
                '0561',
                '0562',
                '0563',
                '0564',
                '0565',
                '0567',
                '0568',
                '0569',
                '0570',
                '0571',
                '0572',
                '0573',
                '0574',
                '0575',
                '0576',
                '0577',
                '0578',
                '0579',
                '0580',
                '0584',
                '01071',
            ],
        ],
        'PhpParser\NodeVisitor' => [
            [
                '0532',
                '0556',
                '0557',
                '0558',
                '0559',
                '0560',
                '0561',
                '0562',
                '0563',
                '0564',
                '0565',
                '0567',
                '0568',
                '0569',
                '0570',
                '0571',
                '0572',
                '0573',
                '0574',
                '0575',
                '0576',
                '0577',
                '0578',
                '0579',
                '0580',
                '0584',
                '01071',
            ],
        ],
        'PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor' => [['0532']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory' => [['0533']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\SymbolFinderInFiles' => [['0534']],
        'PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory' => [['0535']],
        'PHPStan\BetterReflection\Reflector\Reflector' => [['betterReflectionReflector']],
        'PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumDynamicReturnTypeExtension' => [['0536']],
        'PHPStan\Reflection\RequireExtension\RequireExtendsMethodsClassReflectionExtension' => [['0537']],
        'PHPStan\Reflection\RequireExtension\RequireExtendsPropertiesClassReflectionExtension' => [['0538']],
        'PhpParser\PrettyPrinter\Standard' => [1 => ['0539']],
        'PhpParser\PrettyPrinterAbstract' => [1 => ['0539']],
        'PhpParser\PrettyPrinter' => [1 => ['0539']],
        'PHPStan\Node\Printer\Printer' => [['0539']],
        'PHPStan\Node\Printer\ExprPrinter' => [['0540']],
        'PHPStan\PhpDoc\StubPhpDocProvider' => [['stubPhpDocProvider']],
        'PHPStan\PhpDoc\ConstExprNodeResolver' => [['0541']],
        'PHPStan\PhpDoc\StubFilesExtension' => [['0542', '0545', '0548', '0552', '0554', '0555', '0605']],
        'PHPStan\PhpDoc\BcMathNumberStubFilesExtension' => [['0542']],
        'PHPStan\PhpDoc\StubFilesProvider' => [['0543']],
        'PHPStan\PhpDoc\TypeNodeResolver' => [['0544']],
        'PHPStan\PhpDoc\ExtDsStubFilesExtension' => [['0545']],
        'PHPStan\PhpDoc\PhpDocNodeResolver' => [['0546']],
        'PHPStan\PhpDoc\PhpDocStringResolver' => [['0547']],
        'PHPStan\PhpDoc\ReflectionEnumStubFilesExtension' => [['0548']],
        'PHPStan\PhpDoc\StubValidator' => [['0549']],
        'PHPStan\PhpDoc\PhpDocInheritanceResolver' => [['0550']],
        'PHPStan\PhpDoc\TypeNodeResolverExtensionRegistryProvider' => [['0551']],
        'PHPStan\PhpDoc\JsonValidateStubFilesExtension' => [['0552']],
        'PHPStan\PhpDoc\TypeStringResolver' => [['0553']],
        'PHPStan\PhpDoc\SocketSelectStubFilesExtension' => [['0554']],
        'PHPStan\PhpDoc\ReflectionClassStubFilesExtension' => [['0555']],
        'PHPStan\Parser\ImplodeArgVisitor' => [['0556']],
        'PHPStan\Parser\MagicConstantParamDefaultVisitor' => [['0557']],
        'PHPStan\Parser\ArrayWalkArgVisitor' => [['0558']],
        'PHPStan\Parser\ArrayMapArgVisitor' => [['0559']],
        'PHPStan\Parser\DeclarePositionVisitor' => [['0560']],
        'PHPStan\Parser\ArrayFindArgVisitor' => [['0561']],
        'PHPStan\Parser\StandaloneThrowExprVisitor' => [['0562']],
        'PHPStan\Parser\NewAssignedToPropertyVisitor' => [['0563']],
        'PHPStan\Parser\ArrayOffsetNormalizingVisitor' => [['0564']],
        'PHPStan\Parser\ArrayFilterArgVisitor' => [['0565']],
        'PHPStan\Parser\LexerFactory' => [['0566']],
        'PHPStan\Parser\TryCatchTypeVisitor' => [['0567']],
        'PHPStan\Parser\ClosureBindToVarVisitor' => [['0568']],
        'PHPStan\Parser\ClosureArgVisitor' => [['0569']],
        'PHPStan\Parser\ImmediatelyInvokedClosureVisitor' => [['0570']],
        'PHPStan\Parser\LastConditionVisitor' => [['0571']],
        'PHPStan\Parser\CurlSetOptArgVisitor' => [['0572']],
        'PHPStan\Parser\UseAliasVisitor' => [['0573']],
        'PHPStan\Parser\ClosureBindArgVisitor' => [['0574']],
        'PHPStan\Parser\ParentStmtTypesVisitor' => [['0575']],
        'PHPStan\Parser\ArrowFunctionArgVisitor' => [['0576']],
        'PHPStan\Parser\CurlSetOptArrayArgVisitor' => [['0577']],
        'PHPStan\Parser\GotoLabelVisitor' => [['0578']],
        'PHPStan\Parser\AnonymousClassVisitor' => [['0579']],
        'PHPStan\Parser\TypeTraverserInstanceofVisitor' => [['0580']],
        'PHPStan\Dependency\DependencyResolver' => [['0581']],
        'PHPStan\Dependency\PackageDependencyResolver' => [['0582']],
        'PHPStan\Dependency\ExportedNodeResolver' => [['0583']],
        'PHPStan\Dependency\ExportedNodeVisitor' => [['0584']],
        'PHPStan\Dependency\ExportedNodeFetcher' => [['0585']],
        'PHPStan\Process\CpuCoreCounter' => [['0586']],
        'PHPStan\Process\Restart\RestartDiagnoseExtension' => [['0587']],
        'PHPStan\Broker\AnonymousClassNameHelper' => [['0588']],
        'PHPStan\Type\MethodParameterClosureTypeExtension' => [['0589']],
        'PHPStan\Type\StaticMethodParameterClosureTypeExtension' => [['0589']],
        'Larastan\Larastan\ClosureTypes\RelationshipQueryCallbackExtension' => [['0589']],
        'Larastan\Larastan\Collectors\UsedEmailAlternativeSyntaxViewCollector' => [['0590']],
        'Larastan\Larastan\Collectors\UsedEmailSendViewCollector' => [['0591']],
        'Larastan\Larastan\Collectors\UsedEmailViewCollector' => [['0592']],
        'Larastan\Larastan\Collectors\UsedRouteFacadeViewCollector' => [['0593']],
        'Larastan\Larastan\Collectors\UsedTranslationFacadeCollector' => [['0594']],
        'Larastan\Larastan\Collectors\UsedTranslationFunctionCollector' => [['0595']],
        'Larastan\Larastan\Collectors\UsedTranslationTranslatorCollector' => [['0596']],
        'Larastan\Larastan\Collectors\UsedTranslationViewCollector' => [['0597']],
        'Larastan\Larastan\Collectors\UsedViewFacadeMakeCollector' => [['0598']],
        'Larastan\Larastan\Collectors\UsedViewFunctionCollector' => [['0599']],
        'Larastan\Larastan\Collectors\UsedViewInAnotherViewCollector' => [['0600']],
        'Larastan\Larastan\Collectors\UsedViewMakeCollector' => [['0601']],
        'Larastan\Larastan\Internal\ConfigHelper' => [['0602']],
        'Larastan\Larastan\Internal\ConsoleApplicationHelper' => [['0603']],
        'Larastan\Larastan\Internal\ConsoleApplicationResolver' => [['0604']],
        'Larastan\Larastan\LarastanStubFilesExtension' => [['0605']],
        'Larastan\Larastan\Methods\AuthsMethodsExtension' => [['0606']],
        'Larastan\Larastan\Methods\BuilderHelper' => [['0607']],
        'Larastan\Larastan\Methods\ContractsMethodsExtension' => [['0608']],
        'Larastan\Larastan\Methods\EloquentBuilderForwardsCallsExtension' => [['0609']],
        'Larastan\Larastan\Methods\FacadesMethodsExtension' => [['0610']],
        'Larastan\Larastan\Methods\HigherOrderCollectionProxyExtension' => [['0611']],
        'Larastan\Larastan\Methods\HigherOrderTapProxyExtension' => [['0612']],
        'Larastan\Larastan\Methods\MacroMethodsClassReflectionExtension' => [['0613']],
        'Larastan\Larastan\Methods\ManagersMethodsExtension' => [['0614']],
        'Larastan\Larastan\Methods\ModelFactoryMethodsClassReflectionExtension' => [['0615']],
        'Larastan\Larastan\Methods\ModelForwardsCallsExtension' => [['0616']],
        'Larastan\Larastan\Methods\RedirectResponseMethodsClassReflectionExtension' => [['0617']],
        'Larastan\Larastan\Methods\RelationForwardsCallsExtension' => [['0618']],
        'Larastan\Larastan\Methods\StorageMethodsClassReflectionExtension' => [['0619']],
        'Larastan\Larastan\Methods\ViewWithMethodsClassReflectionExtension' => [['0620']],
        'Larastan\Larastan\Properties\HigherOrderCollectionProxyPropertyExtension' => [['0621']],
        'Larastan\Larastan\Properties\MigrationCache' => [['0622']],
        'Larastan\Larastan\Properties\MigrationHelper' => [['0623']],
        'Larastan\Larastan\Properties\ModelAccessorExtension' => [['0624']],
        'Larastan\Larastan\Properties\ModelCastHelper' => [['0625']],
        'Larastan\Larastan\Properties\ModelPropertyExtension' => [['0626']],
        'Larastan\Larastan\Properties\ModelPropertyHelper' => [['0627']],
        'Larastan\Larastan\Properties\ModelRelationsExtension' => [['0628']],
        'Larastan\Larastan\Properties\Schema\MySqlDataTypeToPhpTypeConverter' => [['0629']],
        'Larastan\Larastan\Properties\SquashedMigrationHelper' => [['0630']],
        'Larastan\Larastan\ReturnTypes\AppFacadeEnvironmentReturnTypeExtension' => [['0631']],
        'Larastan\Larastan\ReturnTypes\AppMakeDynamicReturnTypeExtension' => [['0632']],
        'Larastan\Larastan\ReturnTypes\AppMakeHelper' => [['0633']],
        'Larastan\Larastan\ReturnTypes\ApplicationMakeDynamicReturnTypeExtension' => [['0634']],
        'Larastan\Larastan\ReturnTypes\ArrGetDynamicStaticMethodReturnTypeExtension' => [['0635']],
        'Larastan\Larastan\ReturnTypes\AuthExtension' => [['0636']],
        'Larastan\Larastan\ReturnTypes\AuthManagerExtension' => [['0637']],
        'Larastan\Larastan\ReturnTypes\CollectionFilterRejectDynamicReturnTypeExtension' => [['0638']],
        'Larastan\Larastan\ReturnTypes\CollectionWhereNotNullDynamicReturnTypeExtension' => [['0639']],
        'Larastan\Larastan\ReturnTypes\ConsoleCommand\ArgumentDynamicReturnTypeExtension' => [['0640']],
        'Larastan\Larastan\ReturnTypes\ConsoleCommand\HasArgumentDynamicReturnTypeExtension' => [['0641']],
        'Larastan\Larastan\ReturnTypes\ConsoleCommand\HasOptionDynamicReturnTypeExtension' => [['0642']],
        'Larastan\Larastan\ReturnTypes\ConsoleCommand\OptionDynamicReturnTypeExtension' => [['0643']],
        'Larastan\Larastan\ReturnTypes\ContainerMakeDynamicReturnTypeExtension' => [['0644']],
        'Larastan\Larastan\ReturnTypes\DateExtension' => [['0645']],
        'Larastan\Larastan\ReturnTypes\DoubleUnderscoreHelperReturnTypeExtension' => [['0646']],
        'Larastan\Larastan\ReturnTypes\EloquentBuilderExtension' => [['0647']],
        'Larastan\Larastan\ReturnTypes\EloquentCollectionMapDynamicReturnTypeExtension' => [['0648']],
        'Larastan\Larastan\ReturnTypes\FactoryDynamicMethodReturnTypeExtension' => [['0649']],
        'Larastan\Larastan\ReturnTypes\FormRequestSafeDynamicMethodReturnTypeExtension' => [['0650']],
        'Larastan\Larastan\ReturnTypes\GuardDynamicStaticMethodReturnTypeExtension' => [['0651']],
        'Larastan\Larastan\ReturnTypes\GuardExtension' => [['0652']],
        'Larastan\Larastan\ReturnTypes\Helpers\AppExtension' => [['0653']],
        'Larastan\Larastan\ReturnTypes\Helpers\AuthExtension' => [['0654']],
        'Larastan\Larastan\ReturnTypes\Helpers\CollectExtension' => [['0655']],
        'Larastan\Larastan\ReturnTypes\Helpers\LiteralExtension' => [['0656']],
        'Larastan\Larastan\ReturnTypes\Helpers\NowAndTodayExtension' => [['0657']],
        'Larastan\Larastan\ReturnTypes\Helpers\ResponseExtension' => [['0658']],
        'Larastan\Larastan\ReturnTypes\Helpers\StrExtension' => [['0659']],
        'Larastan\Larastan\ReturnTypes\Helpers\TapExtension' => [['0660']],
        'Larastan\Larastan\ReturnTypes\Helpers\ValidatorExtension' => [['0661']],
        'Larastan\Larastan\ReturnTypes\Helpers\ValueExtension' => [['0662']],
        'Larastan\Larastan\ReturnTypes\HigherOrderTapProxyExtension' => [['0663']],
        'Larastan\Larastan\ReturnTypes\LangGetReturnTypeExtension' => [['0664']],
        'Larastan\Larastan\ReturnTypes\ModelDynamicStaticMethodReturnTypeExtension' => [['0665']],
        'Larastan\Larastan\ReturnTypes\ModelFactoryDynamicStaticMethodReturnTypeExtension' => [['0666']],
        'Larastan\Larastan\ReturnTypes\ModelOnlyDynamicMethodReturnTypeExtension' => [['0667']],
        'Larastan\Larastan\ReturnTypes\ModelSerializationDynamicMethodReturnTypeExtension' => [['0668']],
        'Larastan\Larastan\ReturnTypes\RelationCollectionExtension' => [['0669']],
        'Larastan\Larastan\ReturnTypes\RequestFileExtension' => [['0670']],
        'Larastan\Larastan\ReturnTypes\RequestRouteExtension' => [['0671']],
        'Larastan\Larastan\ReturnTypes\RequestUserExtension' => [['0672']],
        'Larastan\Larastan\ReturnTypes\StorageDynamicStaticMethodReturnTypeExtension' => [['0673']],
        'Larastan\Larastan\ReturnTypes\TestCaseExtension' => [['0674']],
        'Larastan\Larastan\ReturnTypes\TransHelperReturnTypeExtension' => [['0675']],
        'Larastan\Larastan\ReturnTypes\TranslatorGetReturnTypeExtension' => [['0676']],
        'Larastan\Larastan\Rules\ArrKeyExistenceRule' => [['0677']],
        'Larastan\Larastan\Rules\ConsoleCommand\UndefinedArgumentOrOptionRule' => [['0678']],
        'Larastan\Larastan\Rules\DeferrableServiceProviderMissingProvidesRule' => [['0679']],
        'Larastan\Larastan\Rules\ModelRelationDefaultsRule' => [['0680']],
        'Larastan\Larastan\Rules\ModelRuleHelper' => [['0681']],
        'Larastan\Larastan\Rules\RelationExistenceHelper' => [['0682']],
        'PHPStan\Rules\MultipleNodeTypesRule' => [
            ['0683', '0714'],
            ['0770', '0796', '0810', '0812', '0813', '0814', '0816', '0982', '0986', '0987', '01021', '01046'],
        ],
        'Larastan\Larastan\Rules\RelationExistenceRule' => [['0683']],
        'Larastan\Larastan\Rules\UselessConstructs\NoUselessValueFunctionCallsRule' => [['0684']],
        'Larastan\Larastan\Rules\UselessConstructs\NoUselessWithFunctionCallsRule' => [['0685']],
        'Larastan\Larastan\SQL\SqlParser' => [0 => ['sqlParser'], 2 => [1 => 'iamcalSqlParser']],
        'Larastan\Larastan\SQL\SqlParserFactory' => [['sqlParserFactory']],
        'Larastan\Larastan\Support\CallArgumentsHelper' => [['0686']],
        'Larastan\Larastan\Support\CollectionHelper' => [['0687']],
        'Larastan\Larastan\Support\ConfigParser' => [['0688']],
        'Larastan\Larastan\Support\HigherOrderCollectionProxyHelper' => [['0689']],
        'Larastan\Larastan\Support\ViewFileHelper' => [['0690']],
        'Larastan\Larastan\Support\ViewParser' => [['0691']],
        'PHPStan\Type\StaticMethodParameterOutTypeExtension' => [['0692']],
        'Larastan\Larastan\Types\ArrPullParameterOutTypeExtension' => [['0692']],
        'PHPStan\PhpDoc\TypeNodeResolverExtension' => [['0693', '0694', '0695', '0696', '0697', '0698', '0699']],
        'PHPStan\PhpDoc\TypeNodeResolverAwareExtension' => [['0693', '0694', '0698']],
        'Larastan\Larastan\Types\BuilderOf\BuilderOfTypeNodeResolverExtension' => [['0693']],
        'Larastan\Larastan\Types\CollectionOf\CollectionOfTypeNodeResolverExtension' => [['0694']],
        'Larastan\Larastan\Types\GenericEloquentBuilderTypeNodeResolverExtension' => [['0695']],
        'Larastan\Larastan\Types\GenericEloquentCollectionTypeNodeResolverExtension' => [['0696']],
        'Larastan\Larastan\Types\ModelProperty\ModelPropertyTypeNodeResolverExtension' => [['0697']],
        'Larastan\Larastan\Types\RelationOf\RelationOfTypeNodeResolverExtension' => [['0698']],
        'Larastan\Larastan\Types\ViewStringTypeNodeResolverExtension' => [['0699']],
        'PHPStan\Rules\Exceptions\MethodThrowTypeCovarianceRule' => [['0700']],
        'PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule' => [['0701']],
        'PHPStan\Rules\Exceptions\MissingCheckedExceptionInPropertyHookThrowsRule' => [['0702']],
        'PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule' => [['0703']],
        'PHPStan\Rules\Properties\UninitializedPropertyRule' => [['0704']],
        'Larastan\Larastan\ReturnTypes\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension' => [['0705']],
        'Larastan\Larastan\ReturnTypes\ConfigRepositoryDynamicMethodReturnTypeExtension' => [['0706']],
        'Larastan\Larastan\ReturnTypes\Helpers\ConfigFunctionDynamicFunctionReturnTypeExtension' => [['0707']],
        'Larastan\Larastan\ReturnTypes\Helpers\EnvFunctionDynamicFunctionReturnTypeExtension' => [['0708']],
        'Larastan\Larastan\Rules\ConfigCollectionRule' => [['0709']],
        'Larastan\Larastan\Rules\ModelAppendsRule' => [['0710']],
        'Larastan\Larastan\Rules\NoAuthFacadeInRequestScopeRule' => [['0711']],
        'Larastan\Larastan\Rules\NoAuthHelperInRequestScopeRule' => [['0712']],
        'Larastan\Larastan\Rules\NoEnvCallsOutsideOfConfigRule' => [['0713']],
        'Larastan\Larastan\Rules\NoImplicitQueryBuilderCallRule' => [['0714']],
        'Larastan\Larastan\Rules\NoMissingTranslationsRule' => [['0715']],
        'Larastan\Larastan\Rules\NoModelMakeRule' => [['0716']],
        'Larastan\Larastan\Rules\NoPublicModelScopeAndAccessorRule' => [['0717']],
        'Larastan\Larastan\Rules\NoUnnecessaryCollectionCallRule' => [['0718']],
        'Larastan\Larastan\Rules\NoUnnecessaryEnumerableToArrayCallsRule' => [['0719']],
        'Larastan\Larastan\Rules\OctaneCompatibilityRule' => [['0720']],
        'Larastan\Larastan\Rules\Queue\BatchableJobChecksCancellationRule' => [['0721']],
        'Larastan\Larastan\Rules\Queue\BatchedJobIsBatchableRule' => [['0722']],
        'Larastan\Larastan\Rules\Queue\JobDispatchedInTransactionUsesAfterCommitRule' => [['0723']],
        'Larastan\Larastan\Rules\Queue\JobWithModelPropertyDeclaresSerializesModelsRule' => [['0724']],
        'Larastan\Larastan\Rules\Queue\NoBatchedUniqueJobRule' => [['0725']],
        'Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueForRule' => [['0726']],
        'Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueIdRule' => [['0727']],
        'Larastan\Larastan\Rules\UnusedViewsRule' => [['0728']],
        'PHPStan\Diagnose\PHPStanDiagnoseExtension' => [2 => ['phpstanDiagnoseExtension']],
        'PHPStan\File\ParentDirectoryRelativePathHelper' => [2 => ['parentDirectoryRelativePathHelper']],
        'PHPStan\File\SimpleRelativePathHelper' => [2 => ['simpleRelativePathHelper']],
        'PHPStan\Reflection\ReflectionProvider' => [0 => ['reflectionProvider'], 2 => ['betterReflectionProvider']],
        'PHPStan\Reflection\BetterReflection\BetterReflectionProvider' => [2 => ['betterReflectionProvider']],
        'Larastan\Larastan\SQL\IamcalSqlParser' => [2 => ['iamcalSqlParser']],
        'PHPStan\File\FileExcluderRawFactory' => [['0729']],
        'PHPStan\Analyser\ExpressionResultFactory' => [['0730']],
        'PHPStan\Analyser\InternalScopeFactoryFactory' => [['0731']],
        'PHPStan\Analyser\ResultCache\ResultCacheManagerFactory' => [['0732']],
        'PHPStan\Reflection\ClassReflectionFactory' => [['0733']],
        'PHPStan\Reflection\FunctionReflectionFactory' => [['0734']],
        'PHPStan\Reflection\Php\PhpMethodReflectionFactory' => [['0735']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory' => [['0736']],
        'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory' => [['0737']],
        'PHPStan\Rules\Missing\MissingReturnRule' => [['0738']],
        'PHPStan\Rules\Traits\NotAnalysedTraitRule' => [['0739']],
        'PHPStan\Rules\Traits\ConflictingTraitConstantsRule' => [['0740']],
        'PHPStan\Rules\Traits\ConstantsInTraitsRule' => [['0741']],
        'PHPStan\Rules\Traits\TraitAttributesRule' => [['0742']],
        'PHPStan\Rules\Cast\DeprecatedCastRule' => [['0743']],
        'PHPStan\Rules\Cast\EchoRule' => [['0744']],
        'PHPStan\Rules\Cast\InvalidCastRule' => [['0745']],
        'PHPStan\Rules\Cast\UnsetCastRule' => [['0746']],
        'PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule' => [['0747']],
        'PHPStan\Rules\Cast\PrintRule' => [['0748']],
        'PHPStan\Rules\Cast\VoidCastRule' => [['0749']],
        'PHPStan\Rules\Comparison\BooleanAndConstantConditionRule' => [['0750']],
        'PHPStan\Rules\Comparison\BooleanOrConstantConditionRule' => [['0751']],
        'PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule' => [['0752']],
        'PHPStan\Rules\Comparison\MatchExpressionRule' => [['0753']],
        'PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule' => [['0754']],
        'PHPStan\Rules\Comparison\NumberComparisonOperatorsConstantConditionRule' => [['0755']],
        'PHPStan\Rules\Comparison\ElseIfConstantConditionRule' => [['0756']],
        'PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule' => [['0757']],
        'PHPStan\Rules\Comparison\WhileLoopAlwaysTrueConditionRule' => [['0758']],
        'PHPStan\Rules\Comparison\BooleanNotConstantConditionRule' => [['0759']],
        'PHPStan\Rules\Comparison\UsageOfVoidMatchExpressionRule' => [['0760']],
        'PHPStan\Rules\Comparison\ConstantConditionInTraitRule' => [['0761']],
        'PHPStan\Rules\Comparison\DoWhileLoopConstantConditionRule' => [['0762']],
        'PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule' => [['0763']],
        'PHPStan\Rules\Comparison\FunctionCallConstantConditionRule' => [['0764']],
        'PHPStan\Rules\Comparison\LogicalXorConstantConditionRule' => [['0765']],
        'PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule' => [['0766']],
        'PHPStan\Rules\Comparison\IfConstantConditionRule' => [['0767']],
        'PHPStan\Rules\Comparison\ConstantLooseComparisonRule' => [['0768']],
        'PHPStan\Rules\Comparison\WhileLoopAlwaysFalseConditionRule' => [['0769']],
        'PHPStan\Rules\Types\InvalidTypesInUnionRule' => [['0770']],
        'PHPStan\Rules\Variables\NullCoalesceRule' => [['0771']],
        'PHPStan\Rules\Variables\EmptyRule' => [['0772']],
        'PHPStan\Rules\Variables\UnsetRule' => [['0773']],
        'PHPStan\Rules\Variables\ThisInStaticStatementRule' => [['0774']],
        'PHPStan\Rules\Variables\CompactVariablesRule' => [['0775']],
        'PHPStan\Rules\Variables\ParameterOutAssignedTypeRule' => [['0776']],
        'PHPStan\Rules\Variables\VariableCloningRule' => [['0777']],
        'PHPStan\Rules\Variables\ThisInGlobalStatementRule' => [['0778']],
        'PHPStan\Rules\Variables\IssetRule' => [['0779']],
        'PHPStan\Rules\Variables\InvalidVariableAssignRule' => [['0780']],
        'PHPStan\Rules\Variables\ParameterOutExecutionEndTypeRule' => [['0781']],
        'PHPStan\Rules\Variables\DefinedVariableRule' => [['0782']],
        'PHPStan\Rules\DateTimeInstantiationRule' => [['0783']],
        'PHPStan\Rules\Constants\ValueAssignedToClassConstantRule' => [['0784']],
        'PHPStan\Rules\Constants\FinalPrivateConstantRule' => [['0785']],
        'PHPStan\Rules\Constants\NativeTypedClassConstantRule' => [['0786']],
        'PHPStan\Rules\Constants\ClassAsClassConstantRule' => [['0787']],
        'PHPStan\Rules\Constants\MissingClassConstantTypehintRule' => [['0788']],
        'PHPStan\Rules\Constants\ConstantRule' => [['0789']],
        'PHPStan\Rules\Constants\FinalConstantRule' => [['0790']],
        'PHPStan\Rules\Constants\MagicConstantContextRule' => [['0791']],
        'PHPStan\Rules\Constants\ConstantAttributesRule' => [['0792']],
        'PHPStan\Rules\Constants\DynamicClassConstantFetchRule' => [['0793']],
        'PHPStan\Rules\Constants\OverridingConstantRule' => [['0794']],
        'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule' => [['0795']],
        'PHPStan\Rules\Arrays\OffsetAccessValueAssignmentRule' => [['0796']],
        'PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule' => [['0797']],
        'PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule' => [['0798']],
        'PHPStan\Rules\Arrays\DeadForeachRule' => [['0799']],
        'PHPStan\Rules\Arrays\IterableInForeachRule' => [['0800']],
        'PHPStan\Rules\Arrays\OffsetAccessAssignOpRule' => [['0801']],
        'PHPStan\Rules\Arrays\ArrayUnpackingRule' => [['0802']],
        'PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule' => [['0803']],
        'PHPStan\Rules\Arrays\OffsetAccessAssignmentRule' => [['0804']],
        'PHPStan\Rules\Arrays\UnpackIterableInArrayRule' => [['0805']],
        'PHPStan\Rules\Arrays\ArrayDestructuringRule' => [['0806']],
        'PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule' => [['0807']],
        'PHPStan\Rules\Operators\PipeOperatorRule' => [['0808']],
        'PHPStan\Rules\Operators\BacktickRule' => [['0809']],
        'PHPStan\Rules\Operators\InvalidAssignVarRule' => [['0810']],
        'PHPStan\Rules\Operators\InvalidComparisonOperationRule' => [['0811']],
        'PHPStan\Rules\Operators\InvalidIncDecOperationRule' => [['0812']],
        'PHPStan\Rules\Operators\InvalidUnaryOperationRule' => [['0813']],
        'PHPStan\Rules\Operators\InvalidBinaryOperationRule' => [['0814']],
        'PHPStan\Rules\Generators\YieldTypeRule' => [['0815']],
        'PHPStan\Rules\Generators\YieldInGeneratorRule' => [['0816']],
        'PHPStan\Rules\Generators\YieldFromTypeRule' => [['0817']],
        'PHPStan\Rules\Regexp\RegularExpressionQuotingRule' => [['0818']],
        'PHPStan\Rules\Regexp\RegularExpressionPatternRule' => [['0819']],
        'PHPStan\Rules\Generics\InterfaceAncestorsRule' => [['0820']],
        'PHPStan\Rules\Generics\UsedTraitsRule' => [['0821']],
        'PHPStan\Rules\Generics\MethodTagTemplateTypeTraitRule' => [['0822']],
        'PHPStan\Rules\Generics\EnumTemplateTypeRule' => [['0823']],
        'PHPStan\Rules\Generics\InterfaceTemplateTypeRule' => [['0824']],
        'PHPStan\Rules\Generics\MethodTemplateTypeRule' => [['0825']],
        'PHPStan\Rules\Generics\ClassTemplateTypeRule' => [['0826']],
        'PHPStan\Rules\Generics\TraitTemplateTypeRule' => [['0827']],
        'PHPStan\Rules\Generics\ClassAncestorsRule' => [['0828']],
        'PHPStan\Rules\Generics\FunctionSignatureVarianceRule' => [['0829']],
        'PHPStan\Rules\Generics\PropertyVarianceRule' => [['0830']],
        'PHPStan\Rules\Generics\EnumAncestorsRule' => [['0831']],
        'PHPStan\Rules\Generics\MethodTagTemplateTypeRule' => [['0832']],
        'PHPStan\Rules\Generics\MethodSignatureVarianceRule' => [['0833']],
        'PHPStan\Rules\Generics\FunctionTemplateTypeRule' => [['0834']],
        'PHPStan\Rules\Methods\StaticMethodCallableRule' => [['0835']],
        'PHPStan\Rules\Methods\CallToStaticMethodStatementWithNoDiscardRule' => [['0836']],
        'PHPStan\Rules\Methods\MethodCallableRule' => [['0837']],
        'PHPStan\Rules\Methods\ReturnTypeRule' => [['0838']],
        'PHPStan\Rules\Methods\MethodVisibilityInInterfaceRule' => [['0839']],
        'PHPStan\Rules\Methods\MissingMagicSerializationMethodsRule' => [['0840']],
        'PHPStan\Rules\Methods\MissingMethodImplementationRule' => [['0841']],
        'PHPStan\Rules\Methods\ConstructorReturnTypeRule' => [['0842']],
        'PHPStan\Rules\Methods\MissingMethodReturnTypehintRule' => [['0843']],
        'PHPStan\Rules\Methods\OverridingMethodRule' => [['0844']],
        'PHPStan\Rules\Methods\CallToMethodStatementWithoutSideEffectsRule' => [['0845']],
        'PHPStan\Rules\Methods\AbstractPrivateMethodRule' => [['0846']],
        'PHPStan\Rules\Methods\ConsistentConstructorDeclarationRule' => [['0847']],
        'PHPStan\Rules\Methods\FinalPrivateMethodRule' => [['0848']],
        'PHPStan\Rules\Methods\MissingMethodParameterTypehintRule' => [['0849']],
        'PHPStan\Rules\Methods\CallStaticMethodsRule' => [['0850']],
        'PHPStan\Rules\Methods\CallPrivateMethodThroughStaticRule' => [['0851']],
        'PHPStan\Rules\Methods\MethodAttributesRule' => [['0852']],
        'PHPStan\Rules\Methods\CallMethodsRule' => [['0853']],
        'PHPStan\Rules\Methods\CallToStaticMethodStatementWithoutSideEffectsRule' => [['0854']],
        'PHPStan\Rules\Methods\MissingMethodSelfOutTypeRule' => [['0855']],
        'PHPStan\Rules\Methods\AbstractMethodInNonAbstractClassRule' => [['0856']],
        'PHPStan\Rules\Methods\ExistingClassesInTypehintsRule' => [['0857']],
        'PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule' => [['0858']],
        'PHPStan\Rules\Methods\NullsafeMethodCallRule' => [['0859']],
        'PHPStan\Rules\Methods\ConsistentConstructorRule' => [['0860']],
        'PHPStan\Rules\Methods\CallToConstructorStatementWithoutSideEffectsRule' => [['0861']],
        'PHPStan\Rules\Methods\CallToMethodStatementWithNoDiscardRule' => [['0862']],
        'PHPStan\Rules\Methods\MethodCallWithPossiblyRenamedNamedArgumentRule' => [['0863']],
        'PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule' => [['0864']],
        'PHPStan\Rules\Functions\ExistingClassesInArrowFunctionTypehintsRule' => [['0865']],
        'PHPStan\Rules\Functions\FunctionCallableRule' => [['0866']],
        'PHPStan\Rules\Functions\InvalidParameterNameRule' => [['0867']],
        'PHPStan\Rules\Functions\ReturnTypeRule' => [['0868']],
        'PHPStan\Rules\Functions\UselessFunctionReturnValueRule' => [['0869']],
        'PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule' => [['0870']],
        'PHPStan\Rules\Functions\CallToFunctionParametersRule' => [['0871']],
        'PHPStan\Rules\Functions\CallUserFuncRule' => [['0872']],
        'PHPStan\Rules\Functions\ImplodeParameterCastableToStringRule' => [['0873']],
        'PHPStan\Rules\Functions\ArrayFilterRule' => [['0874']],
        'PHPStan\Rules\Functions\ArrowFunctionAttributesRule' => [['0875']],
        'PHPStan\Rules\Functions\ReturnTypeAfterFinallyRule' => [['0876']],
        'PHPStan\Rules\Functions\ClosureAttributesRule' => [['0877']],
        'PHPStan\Rules\Functions\SortParameterCastableToStringRule' => [['0878']],
        'PHPStan\Rules\Functions\ReturnNullsafeByRefRule' => [['0879']],
        'PHPStan\Rules\Functions\IncompatibleArrowFunctionDefaultParameterTypeRule' => [['0880']],
        'PHPStan\Rules\Functions\ArrayValuesRule' => [['0881']],
        'PHPStan\Rules\Functions\ParamAttributesRule' => [['0882']],
        'PHPStan\Rules\Functions\DefineParametersRule' => [['0883']],
        'PHPStan\Rules\Functions\CallToFunctionStatementWithNoDiscardRule' => [['0884']],
        'PHPStan\Rules\Functions\CallCallablesRule' => [['0885']],
        'PHPStan\Rules\Functions\CallToFunctionStatementWithoutSideEffectsRule' => [['0886']],
        'PHPStan\Rules\Functions\InvalidLexicalVariablesInClosureUseRule' => [['0887']],
        'PHPStan\Rules\Functions\VariadicParametersDeclarationRule' => [['0888']],
        'PHPStan\Rules\Functions\FilterVarRule' => [['0889']],
        'PHPStan\Rules\Functions\ExistingClassesInTypehintsRule' => [['0890']],
        'PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule' => [['0891']],
        'PHPStan\Rules\Functions\RedefinedParametersRule' => [['0892']],
        'PHPStan\Rules\Functions\ClosureReturnTypeRule' => [['0893']],
        'PHPStan\Rules\Functions\IncompatibleClosureDefaultParameterTypeRule' => [['0894']],
        'PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule' => [['0895']],
        'PHPStan\Rules\Functions\RandomIntParametersRule' => [['0896']],
        'PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule' => [['0897']],
        'PHPStan\Rules\Functions\CallToNonExistentFunctionRule' => [['0898']],
        'PHPStan\Rules\Functions\InnerFunctionRule' => [['0899']],
        'PHPStan\Rules\Functions\FunctionAttributesRule' => [['0900']],
        'PHPStan\Rules\Functions\ParameterCastableToStringRule' => [['0901']],
        'PHPStan\Rules\Functions\PrintfParametersRule' => [['0902']],
        'PHPStan\Rules\Functions\PrintfArrayParametersRule' => [['0903']],
        'PHPStan\Rules\Functions\ArrowFunctionReturnNullsafeByRefRule' => [['0904']],
        'PHPStan\Rules\Functions\UnusedClosureUsesRule' => [['0905']],
        'PHPStan\Rules\Exceptions\OverwrittenExitPointByFinallyRule' => [['0906']],
        'PHPStan\Rules\Exceptions\ThrowsVoidFunctionWithExplicitThrowPointRule' => [['0907']],
        'PHPStan\Rules\Exceptions\ThrowExpressionRule' => [['0908']],
        'PHPStan\Rules\Exceptions\ReturnInFinallyRule' => [['0909']],
        'PHPStan\Rules\Exceptions\ThrowsVoidMethodWithExplicitThrowPointRule' => [['0910']],
        'PHPStan\Rules\Exceptions\ThrowsVoidPropertyHookWithExplicitThrowPointRule' => [['0911']],
        'PHPStan\Rules\Exceptions\CatchWithUnthrownExceptionRule' => [['0912']],
        'PHPStan\Rules\Exceptions\ThrowExprTypeRule' => [['0913']],
        'PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule' => [['0914']],
        'PHPStan\Rules\Exceptions\NoncapturingCatchRule' => [['0915']],
        'PHPStan\Rules\Pure\PurePropertyHookRule' => [['0916']],
        'PHPStan\Rules\Pure\PureFunctionRule' => [['0917']],
        'PHPStan\Rules\Pure\PureMethodRule' => [['0918']],
        'PHPStan\Rules\Keywords\GotoUndefinedLabelRule' => [['0919']],
        'PHPStan\Rules\Keywords\DeclareStrictTypesRule' => [['0920']],
        'PHPStan\Rules\Keywords\ContinueBreakInLoopRule' => [['0921']],
        'PHPStan\Rules\Keywords\RequireFileExistsRule' => [['0922']],
        'PHPStan\Rules\DeadCode\NoopRule' => [['0923']],
        'PHPStan\Rules\DeadCode\CallToFunctionStatementWithoutImpurePointsRule' => [['0924']],
        'PHPStan\Rules\DeadCode\UnusedPrivateConstantRule' => [['0925']],
        'PHPStan\Rules\DeadCode\UnusedPrivatePropertyRule' => [['0926']],
        'PHPStan\Rules\DeadCode\CallToMethodStatementWithoutImpurePointsRule' => [['0927']],
        'PHPStan\Rules\DeadCode\CallToConstructorStatementWithoutImpurePointsRule' => [['0928']],
        'PHPStan\Rules\DeadCode\UnreachableStatementRule' => [['0929']],
        'PHPStan\Rules\DeadCode\UnusedPrivateMethodRule' => [['0930']],
        'PHPStan\Rules\DeadCode\CallToStaticMethodStatementWithoutImpurePointsRule' => [['0931']],
        'PHPStan\Rules\TooWideTypehints\TooWideMethodReturnTypehintRule' => [['0932']],
        'PHPStan\Rules\TooWideTypehints\TooWideFunctionReturnTypehintRule' => [['0933']],
        'PHPStan\Rules\TooWideTypehints\TooWideMethodParameterOutTypeRule' => [['0934']],
        'PHPStan\Rules\TooWideTypehints\TooWideClosureReturnTypehintRule' => [['0935']],
        'PHPStan\Rules\TooWideTypehints\TooWideFunctionParameterOutTypeRule' => [['0936']],
        'PHPStan\Rules\TooWideTypehints\TooWideArrowFunctionReturnTypehintRule' => [['0937']],
        'PHPStan\Rules\TooWideTypehints\TooWidePropertyTypeRule' => [['0938']],
        'PHPStan\Rules\Names\UsedNamesRule' => [['0939']],
        'PHPStan\Rules\Whitespace\FileWhitespaceRule' => [['0940']],
        'PHPStan\Rules\Ignore\IgnoreParseErrorRule' => [['0941']],
        'PHPStan\Rules\Classes\InstantiationRule' => [['0942']],
        'PHPStan\Rules\Classes\MixinTraitRule' => [['0943']],
        'PHPStan\Rules\Classes\ClassConstantRule' => [['0944']],
        'PHPStan\Rules\Classes\AllowedSubTypesRule' => [['0945']],
        'PHPStan\Rules\Classes\ExistingClassInInstanceOfRule' => [['0946']],
        'PHPStan\Rules\Classes\MethodTagTraitUseRule' => [['0947']],
        'PHPStan\Rules\Classes\EnumSanityRule' => [['0948']],
        'PHPStan\Rules\Classes\ClassAttributesRule' => [['0949']],
        'PHPStan\Rules\Classes\ClassConstantAttributesRule' => [['0950']],
        'PHPStan\Rules\Classes\TraitAttributeClassRule' => [['0951']],
        'PHPStan\Rules\Classes\AccessPrivateConstantThroughStaticRule' => [['0952']],
        'PHPStan\Rules\Classes\NewStaticRule' => [['0953']],
        'PHPStan\Rules\Classes\RequireExtendsRule' => [['0954']],
        'PHPStan\Rules\Classes\ImpossibleInstanceOfRule' => [['0955']],
        'PHPStan\Rules\Classes\RequireImplementsRule' => [['0956']],
        'PHPStan\Rules\Classes\LocalTypeAliasesRule' => [['0957']],
        'PHPStan\Rules\Classes\ExistingClassInClassExtendsRule' => [['0958']],
        'PHPStan\Rules\Classes\PropertyTagRule' => [['0959']],
        'PHPStan\Rules\Classes\PropertyTagTraitUseRule' => [['0960']],
        'PHPStan\Rules\Classes\LocalTypeTraitAliasesRule' => [['0961']],
        'PHPStan\Rules\Classes\InstantiationCallableRule' => [['0962']],
        'PHPStan\Rules\Classes\DuplicateDeclarationRule' => [['0963']],
        'PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule' => [['0964']],
        'PHPStan\Rules\Classes\ReadOnlyClassRule' => [['0965']],
        'PHPStan\Rules\Classes\NonClassAttributeClassRule' => [['0966']],
        'PHPStan\Rules\Classes\UnusedConstructorParametersRule' => [['0967']],
        'PHPStan\Rules\Classes\MixinTraitUseRule' => [['0968']],
        'PHPStan\Rules\Classes\PropertyTagTraitRule' => [['0969']],
        'PHPStan\Rules\Classes\ExistingClassInTraitUseRule' => [['0970']],
        'PHPStan\Rules\Classes\LocalTypeTraitUseAliasesRule' => [['0971']],
        'PHPStan\Rules\Classes\MethodTagRule' => [['0972']],
        'PHPStan\Rules\Classes\MixinRule' => [['0973']],
        'PHPStan\Rules\Classes\MethodTagTraitRule' => [['0974']],
        'PHPStan\Rules\Classes\DuplicateTraitDeclarationRule' => [['0975']],
        'PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule' => [['0976']],
        'PHPStan\Rules\Classes\InvalidPromotedPropertiesRule' => [['0977']],
        'PHPStan\Rules\Classes\ExistingClassesInEnumImplementsRule' => [['0978']],
        'PHPStan\Rules\PhpDoc\IncompatiblePropertyHookPhpDocTypeRule' => [['0979']],
        'PHPStan\Rules\PhpDoc\InvalidPhpDocVarTagTypeRule' => [['0980']],
        'PHPStan\Rules\PhpDoc\SealedDefinitionTraitRule' => [['0981']],
        'PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule' => [['0982']],
        'PHPStan\Rules\PhpDoc\RequireExtendsDefinitionClassRule' => [['0983']],
        'PHPStan\Rules\PhpDoc\FunctionConditionalReturnTypeRule' => [['0984']],
        'PHPStan\Rules\PhpDoc\IncompatibleClassConstantPhpDocTypeRule' => [['0985']],
        'PHPStan\Rules\PhpDoc\InvalidPHPStanDocTagRule' => [['0986']],
        'PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule' => [['0987']],
        'PHPStan\Rules\PhpDoc\IncompatibleParamImmediatelyInvokedCallableRule' => [['0988']],
        'PHPStan\Rules\PhpDoc\VarTagChangedExpressionTypeRule' => [['0989']],
        'PHPStan\Rules\PhpDoc\IncompatibleSelfOutTypeRule' => [['0990']],
        'PHPStan\Rules\PhpDoc\RequireImplementsDefinitionClassRule' => [['0991']],
        'PHPStan\Rules\PhpDoc\SealedDefinitionClassRule' => [['0992']],
        'PHPStan\Rules\PhpDoc\WrongVariableNameInVarTagRule' => [['0993']],
        'PHPStan\Rules\PhpDoc\MethodConditionalReturnTypeRule' => [['0994']],
        'PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule' => [['0995']],
        'PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule' => [['0996']],
        'PHPStan\Rules\PhpDoc\RequireImplementsDefinitionTraitRule' => [['0997']],
        'PHPStan\Rules\PhpDoc\FunctionAssertRule' => [['0998']],
        'PHPStan\Rules\PhpDoc\RequireExtendsDefinitionTraitRule' => [['0999']],
        'PHPStan\Rules\PhpDoc\MethodAssertRule' => [['01000']],
        'PHPStan\Rules\Api\GetTemplateTypeRule' => [['01001']],
        'PHPStan\Rules\Api\ApiInstantiationRule' => [['01002']],
        'PHPStan\Rules\Api\OldPhpParser4ClassRule' => [['01003']],
        'PHPStan\Rules\Api\ApiInstanceofRule' => [['01004']],
        'PHPStan\Rules\Api\ApiInstanceofTypeRule' => [['01005']],
        'PHPStan\Rules\Api\NodeConnectingVisitorAttributesRule' => [['01006']],
        'PHPStan\Rules\Api\PhpStanNamespaceIn3rdPartyPackageRule' => [['01007']],
        'PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule' => [['01008']],
        'PHPStan\Rules\Namespaces\ExistingNamesInUseRule' => [['01009']],
        'PHPStan\Rules\Properties\InvalidCallablePropertyTypeRule' => [['01010']],
        'PHPStan\Rules\Properties\TypesAssignedToPropertiesRule' => [['01011']],
        'PHPStan\Rules\Properties\ReadOnlyPropertyRule' => [['01012']],
        'PHPStan\Rules\Properties\ExistingClassesInPropertiesRule' => [['01013']],
        'PHPStan\Rules\Properties\SetNonVirtualPropertyHookAssignRule' => [['01014']],
        'PHPStan\Rules\Properties\PropertyInClassRule' => [['01015']],
        'PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule' => [['01016']],
        'PHPStan\Rules\Properties\ExistingClassesInPropertyHookTypehintsRule' => [['01017']],
        'PHPStan\Rules\Properties\NullsafePropertyFetchRule' => [['01018']],
        'PHPStan\Rules\Properties\PropertyAssignRefRule' => [['01019']],
        'PHPStan\Rules\Properties\PropertyHookAttributesRule' => [['01020']],
        'PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule' => [['01021']],
        'PHPStan\Rules\Properties\PropertyAttributesRule' => [['01022']],
        'PHPStan\Rules\Properties\SetPropertyHookParameterRule' => [['01023']],
        'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRefRule' => [['01024']],
        'PHPStan\Rules\Properties\PropertiesInInterfaceRule' => [['01025']],
        'PHPStan\Rules\Properties\ReadOnlyPropertyAssignRule' => [['01026']],
        'PHPStan\Rules\Properties\OverridingPropertyRule' => [['01027']],
        'PHPStan\Rules\Properties\GetNonVirtualPropertyHookReadRule' => [['01028']],
        'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRule' => [['01029']],
        'PHPStan\Rules\Properties\MissingPropertyTypehintRule' => [['01030']],
        'PHPStan\Rules\Properties\AccessPropertiesInAssignRule' => [['01031']],
        'PHPStan\Rules\Properties\ReadOnlyPropertyAssignRefRule' => [['01032']],
        'PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule' => [['01033']],
        'PHPStan\Rules\Properties\MissingReadOnlyByPhpDocPropertyAssignRule' => [['01034']],
        'PHPStan\Rules\Properties\MissingReadOnlyPropertyAssignRule' => [['01035']],
        'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyRule' => [['01036']],
        'PHPStan\Rules\Properties\AccessPropertiesRule' => [['01037']],
        'PHPStan\Rules\Properties\AccessStaticPropertiesRule' => [['01038']],
        'PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule' => [['01039']],
        'PHPStan\Rules\Properties\AccessPrivatePropertyThroughStaticRule' => [['01040']],
        'PHPStan\Rules\EnumCases\EnumCaseAttributesRule' => [['01041']],
        'PHPStan\Rules\EnumCases\EnumCaseOutsideEnumRule' => [['01042']],
        'PHPStan\Rules\EnumCases\OverridingEnumCaseRule' => [['01043']],
        'PHPStan\Rules\Comparison\SwitchConditionRule' => [['01044']],
        'PHPStan\Rules\Comparison\ImpossibleInArrayHaystackFiniteTypesRule' => [['01045']],
        'PHPStan\Rules\Variables\AssignToByRefExprFromForeachRule' => [['01046']],
        'PHPStan\Rules\DateIntervalInstantiationRule' => [['01047']],
        'PHPStan\Rules\Constants\ValueAssignedToGlobalConstantRule' => [['01048']],
        'PHPStan\Rules\Constants\ValueAssignedToDefineRule' => [['01049']],
        'PHPStan\Rules\Methods\UnusedMethodParametersRule' => [['01050']],
        'PHPStan\Rules\Functions\ReplaceCountMismatchRule' => [['01051']],
        'PHPStan\Rules\Functions\PrintfParameterTypeRule' => [['01052']],
        'PHPStan\Rules\Functions\UnusedFunctionParametersRule' => [['01053']],
        'PHPStan\Rules\Functions\ParameterCastableToNumberRule' => [['01054']],
        'PHPStan\Rules\Functions\SortWithoutEffectRule' => [['01055']],
        'PHPStan\Rules\Exceptions\TooWidePropertyHookThrowTypeRule' => [['01056']],
        'PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule' => [['01057']],
        'PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule' => [['01058']],
        'PHPStan\Rules\Keywords\UnusedLabelRule' => [['01059']],
        'PHPStan\Rules\DeadCode\UnusedVariableRule' => [['01060']],
        'PHPStan\Rules\Classes\NewStaticInAbstractClassStaticMethodRule' => [['01061']],
        'PHPStan\Rules\Traits\TraitUseCollector' => [['01062']],
        'PHPStan\Rules\DeadCode\MethodWithoutImpurePointsCollector' => [['01063']],
        'PHPStan\Rules\DeadCode\ConstructorWithoutImpurePointsCollector' => [['01064']],
        'PHPStan\Rules\DeadCode\PossiblyPureStaticCallCollector' => [['01065']],
        'PHPStan\Rules\DeadCode\PossiblyPureMethodCallCollector' => [['01066']],
        'PHPStan\Rules\DeadCode\PossiblyPureFuncCallCollector' => [['01067']],
        'PHPStan\Rules\DeadCode\PossiblyPureNewCollector' => [['01068']],
        'PHPStan\Rules\DeadCode\FunctionWithoutImpurePointsCollector' => [['01069']],
        'PHPStan\DependencyInjection\ExtensionsCollection' => [
            2 => [
                'phpstan.extensionsCollection.PHPStan.Diagnose.DiagnoseExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Constants.AlwaysUsedClassConstantsExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Rule',
                'phpstan.extensionsCollection.PHPStan.Rules.Methods.AlwaysUsedMethodExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedPropertyUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassConstantUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassNameUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedFunctionUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Properties.ReadWritePropertiesExtension',
                'phpstan.extensionsCollection.PHPStan.Collectors.Collector',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.ExpressionTypeResolverExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.OperatorTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicMethodThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.UnaryOperatorTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicMethodReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Classes.ForbiddenClassNameExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.ExprHandler',
                'phpstan.extensionsCollection.PHPStan.Analyser.StmtHandler',
                'phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheValueExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheMetaExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.PerFileAnalysisResettable',
                'phpstan.extensionsCollection.PHPStan.Analyser.IgnoreErrorExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.MethodDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ConstantDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.PropertyDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassConstantDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.FunctionDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.EnumCaseDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.PropertiesClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.MethodsClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.AllowedSubTypesClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.AdditionalConstructorsExtension',
                'phpstan.extensionsCollection.PHPStan.PhpDoc.StubFilesExtension',
                'phpstan.extensionsCollection.PHPStan.PhpDoc.TypeNodeResolverExtension',
                'phpstan.extensionsCollection.PhpParser.NodeVisitor',
            ],
        ],
        'PHPStan\DependencyInjection\LazyExtensionsCollection' => [
            2 => [
                'phpstan.extensionsCollection.PHPStan.Diagnose.DiagnoseExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Constants.AlwaysUsedClassConstantsExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Rule',
                'phpstan.extensionsCollection.PHPStan.Rules.Methods.AlwaysUsedMethodExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedPropertyUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassConstantUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassNameUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedFunctionUsageExtension',
                'phpstan.extensionsCollection.PHPStan.Rules.Properties.ReadWritePropertiesExtension',
                'phpstan.extensionsCollection.PHPStan.Collectors.Collector',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.ExpressionTypeResolverExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureThisExtension',
                'phpstan.extensionsCollection.PHPStan.Type.OperatorTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicMethodThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.UnaryOperatorTypeSpecifyingExtension',
                'phpstan.extensionsCollection.PHPStan.Type.MethodParameterOutTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionThrowTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Type.DynamicMethodReturnTypeExtension',
                'phpstan.extensionsCollection.PHPStan.Classes.ForbiddenClassNameExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.ExprHandler',
                'phpstan.extensionsCollection.PHPStan.Analyser.StmtHandler',
                'phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheValueExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheMetaExtension',
                'phpstan.extensionsCollection.PHPStan.Analyser.PerFileAnalysisResettable',
                'phpstan.extensionsCollection.PHPStan.Analyser.IgnoreErrorExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.MethodDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ConstantDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.PropertyDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassConstantDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.FunctionDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.EnumCaseDeprecationExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.PropertiesClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.MethodsClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.AllowedSubTypesClassReflectionExtension',
                'phpstan.extensionsCollection.PHPStan.Reflection.AdditionalConstructorsExtension',
                'phpstan.extensionsCollection.PHPStan.PhpDoc.StubFilesExtension',
                'phpstan.extensionsCollection.PHPStan.PhpDoc.TypeNodeResolverExtension',
                'phpstan.extensionsCollection.PhpParser.NodeVisitor',
            ],
        ],
        'PhpParser\BuilderFactory' => [['01070']],
        'PhpParser\NodeVisitor\NameResolver' => [['01071']],
        'PHPStan\PhpDocParser\ParserConfig' => [['01072']],
        'PHPStan\PhpDocParser\Lexer\Lexer' => [['01073']],
        'PHPStan\PhpDocParser\Parser\TypeParser' => [['01074']],
        'PHPStan\PhpDocParser\Parser\ConstExprParser' => [['01075']],
        'PHPStan\PhpDocParser\Parser\PhpDocParser' => [['01076']],
        'PHPStan\PhpDocParser\Printer\Printer' => [['01077']],
        'PHPStan\BetterReflection\SourceLocator\SourceStubber\SourceStubber' => [1 => ['01078', '01079']],
        'PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber' => [['01078']],
        'PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber' => [['01079']],
        'PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension' => [
            ['01080', '01081', '01082', '01083', '01084'],
        ],
        'PHPStan\Type\Php\DateTimeModifyReturnTypeExtension' => [['01085', '01086']],
        'PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension' => [['01087', '01088']],
        'PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension' => [
            ['01089', '01090'],
        ],
        'PHPStan\Command\ErrorFormatter\JsonErrorFormatter' => [['errorFormatter.json', 'errorFormatter.prettyJson']],
        'PHPStan\File\FileExcluder' => [2 => ['fileExcluderAnalyse', 'fileExcluderScan']],
        'PHPStan\File\FileFinder' => [2 => ['fileFinderAnalyse', 'fileFinderScan']],
        'PHPStan\Cache\CacheStorage' => [2 => ['cacheStorage']],
        'PHPStan\Cache\FileCacheStorage' => [2 => ['cacheStorage']],
        'PHPStan\BetterReflection\SourceLocator\Type\SourceLocator' => [2 => ['betterReflectionSourceLocator']],
        'PHPStan\Parser\Parser' => [
            2 => [
                'php8Parser',
                'currentPhpVersionSimpleDirectParser',
                'currentPhpVersionSimpleParser',
                'currentPhpVersionRichParser',
                'pathRoutingParser',
                'cachedRichParser',
                'cachedSimpleParser',
                'cachedPhp8Parser',
                'defaultAnalysisParser',
                'freshStubParser',
                'stubParser',
                'migrationsParser',
            ],
        ],
        'PHPStan\Parser\SimpleParser' => [2 => ['php8Parser', 'currentPhpVersionSimpleDirectParser']],
        'PhpParser\Lexer' => [2 => ['php8Lexer', 'currentPhpVersionLexer']],
        'PhpParser\Lexer\Emulative' => [2 => ['php8Lexer']],
        'PhpParser\ParserAbstract' => [2 => ['php8PhpParser', 'currentPhpVersionPhpParser']],
        'PhpParser\Parser' => [2 => ['php8PhpParser', 'currentPhpVersionPhpParser', 'phpParserDecorator']],
        'PhpParser\Parser\Php8' => [2 => ['php8PhpParser']],
        'PHPStan\Parser\PhpParserFactory' => [2 => ['currentPhpVersionPhpParserFactory']],
        'PHPStan\Parser\CleaningParser' => [2 => ['currentPhpVersionSimpleParser']],
        'PHPStan\Parser\RichParser' => [2 => ['currentPhpVersionRichParser']],
        'PHPStan\Parser\PathRoutingParser' => [2 => ['pathRoutingParser', 'defaultAnalysisParser']],
        'PHPStan\Parser\PhpParserDecorator' => [2 => ['phpParserDecorator']],
        'PHPStan\Parser\CachedParser' => [
            2 => ['cachedRichParser', 'cachedSimpleParser', 'cachedPhp8Parser', 'stubParser', 'migrationsParser'],
        ],
        'PHPStan\Parser\StubParser' => [2 => ['freshStubParser']],
        'PHPStan\Rules\InternalTag\RestrictedInternalClassConstantUsageExtension' => [['01091']],
        'PHPStan\Rules\InternalTag\RestrictedInternalClassNameUsageExtension' => [['01092']],
        'PHPStan\Rules\InternalTag\RestrictedInternalFunctionUsageExtension' => [['01093']],
        'PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageExtension' => [['01094']],
        'PHPStan\Rules\InternalTag\RestrictedInternalPropertyUsageExtension' => [['01094']],
        'PHPStan\Rules\InternalTag\RestrictedInternalMethodUsageExtension' => [['01095']],
        'Larastan\Larastan\ReturnTypes\ContainerArrayAccessDynamicMethodReturnTypeExtension' => [
            ['01096', '01097', '01098', '01099'],
        ],
        'Larastan\Larastan\Types\AbortIfFunctionTypeSpecifyingExtension' => [['01100', '01101', '01102', '01103']],
        'Larastan\Larastan\ReturnTypes\AppEnvironmentReturnTypeExtension' => [['01104', '01105']],
        'Larastan\Larastan\Rules\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule' => [['01106', '01107']],
        'Illuminate\Filesystem\Filesystem' => [['01108']],
        'Carbon\PHPStan\MacroExtension' => [['01109']],
    ];

    public function __construct(array $params = [])
    {
        parent::__construct($params);
    }

    public function createService01(): SystemResourcesDiagnoseExtension
    {
        return new SystemResourcesDiagnoseExtension(
            $this->getService('0586'),
            $this->getParameter('parallel')['loadLimit']
        );
    }

    public function createService02(): ParallelAnalyser
    {
        return new ParallelAnalyser(
            $this->getParameter('internalErrorsCountLimit'),
            $this->getParameter('parallel')['processTimeout'],
            $this->getParameter('parallel')['buffer'],
            $this->getService('04'),
            $this->getService('0525'),
            $this->getService('03')
        );
    }

    public function createService03(): WorkerRunner
    {
        return new WorkerRunner(
            $this->getService('0104'),
            $this->getService('0470'),
            $this->getService('registry'),
            $this->getService('0101'),
            $this->getService('0483'),
            $this->getParameter('parallel')['buffer']
        );
    }

    public function createService04(): ForkParallelChecker
    {
        return new ForkParallelChecker;
    }

    public function createService05(): Scheduler
    {
        return new Scheduler(
            $this->getParameter('parallel')['jobSize'],
            $this->getParameter('parallel')['maximumNumberOfProcesses'],
            $this->getParameter('parallel')['minimumNumberOfJobsPerProcess']
        );
    }

    public function createService06(): ComposerPhpVersionFactory
    {
        return new ComposerPhpVersionFactory($this->getParameter('composerAutoloaderProjectPaths'));
    }

    public function createService07(): ConfiguredPhpVersionRangeHelper
    {
        return new ConfiguredPhpVersionRangeHelper($this->getParameter('phpVersion'), $this->getService('06'));
    }

    public function createService08(): PhpVersionFactoryFactory
    {
        return new PhpVersionFactoryFactory(
            $this->getParameter('phpVersion'),
            $this->getParameter('composerAutoloaderProjectPaths')
        );
    }

    public function createService09(): PhpVersion
    {
        return $this->getService('010')->create();
    }

    public function createService010(): PhpVersionFactory
    {
        return $this->getService('08')->create();
    }

    public function createService011(): DerivativeContainerFactory
    {
        return new DerivativeContainerFactory(
            $this->getParameter('currentWorkingDirectory'),
            $this->getParameter('tempDir'),
            $this->getParameter('additionalConfigFiles'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getParameter('analysedPathsFromConfig'),
            $this->getParameter('usedLevel'),
            $this->getParameter('generateBaselineFile'),
            $this->getParameter('cliAutoloadFile'),
            $this->getParameter('singleReflectionFile'),
            $this->getParameter('singleReflectionInsteadOfFile')
        );
    }

    public function createService012(): Container
    {
        return new MemoizingContainer($this->getService('013'));
    }

    public function createService013(): NetteContainer
    {
        return new NetteContainer($this);
    }

    public function createService014(): ClassReflectionExtensionRegistryProvider
    {
        return new LazyClassReflectionExtensionRegistryProvider($this->getService('012'));
    }

    public function createService015(): Cache
    {
        return new Cache($this->getService('cacheStorage'));
    }

    public function createService016(): UsedTraitFilesCollector
    {
        return new UsedTraitFilesCollector;
    }

    public function createService017(): TraitDeclarationCollector
    {
        return new TraitDeclarationCollector;
    }

    public function createService018(): ClassForbiddenNameCheck
    {
        return new ClassForbiddenNameCheck($this->getService('phpstan.extensionsCollection.PHPStan.Classes.ForbiddenClassNameExtension'));
    }

    public function createService019(): ClassCaseSensitivityCheck
    {
        return new ClassCaseSensitivityCheck(
            $this->getService('reflectionProvider'),
            $this->getParameter('checkInternalClassCaseSensitivity'),
            $this->getParameter('featureToggles')['checkImportedClassNameCase']
        );
    }

    public function createService020(): DumpNativeTypeRule
    {
        return new DumpNativeTypeRule($this->getService('reflectionProvider'));
    }

    public function createService021(): FileAssertRule
    {
        return new FileAssertRule($this->getService('reflectionProvider'), $this->getService('0553'));
    }

    public function createService022(): DumpTypeRule
    {
        return new DumpTypeRule($this->getService('reflectionProvider'));
    }

    public function createService023(): DebugScopeRule
    {
        return new DebugScopeRule($this->getService('reflectionProvider'));
    }

    public function createService024(): DumpPhpDocTypeRule
    {
        return new DumpPhpDocTypeRule($this->getService('reflectionProvider'), $this->getService('01077'));
    }

    public function createService025(): ConstantConditionRuleHelper
    {
        return new ConstantConditionRuleHelper($this->getParameter('treatPhpDocTypesAsCertain'));
    }

    public function createService026(): FunctionCallConstantConditionHelper
    {
        return new FunctionCallConstantConditionHelper($this->getService('0540'), $this->getService('0466'));
    }

    public function createService027(): ImpossibleCheckTypeHelper
    {
        return new ImpossibleCheckTypeHelper(
            $this->getService('reflectionProvider'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService028(): ConstantConditionInTraitHelper
    {
        return new ConstantConditionInTraitHelper($this->getService('0540'), $this->getService('0466'));
    }

    public function createService029(): AttributesCheck
    {
        return new AttributesCheck(
            $this->getService('reflectionProvider'),
            $this->getService('071'),
            $this->getService('066'),
            $this->getService('090'),
            $this->getParameter('deprecationRulesInstalled')
        );
    }

    public function createService030(): ParameterOutTypeCheck
    {
        return new ParameterOutTypeCheck($this->getService('041'));
    }

    public function createService031(): NeverRuleHelper
    {
        return new NeverRuleHelper;
    }

    public function createService032(): OverrideAttributeOnClassConstantCheck
    {
        return new OverrideAttributeOnClassConstantCheck(
            $this->getParameter('checkMissingOverrideConstantAttribute'),
            $this->getParameter('checkMissingOverridePropertyAttribute'),
            $this->getParameter('checkMissingOverrideMethodAttribute')
        );
    }

    public function createService033(): RestrictedInternalUsageHelper
    {
        return new RestrictedInternalUsageHelper;
    }

    public function createService034(): NonexistentOffsetInArrayDimFetchCheck
    {
        return new NonexistentOffsetInArrayDimFetchCheck(
            $this->getService('041'),
            $this->getParameter('reportMaybes'),
            $this->getParameter('reportPossiblyNonexistentGeneralArrayOffset'),
            $this->getParameter('reportPossiblyNonexistentConstantArrayOffset')
        );
    }

    public function createService035(): GenericAncestorsCheck
    {
        return new GenericAncestorsCheck(
            $this->getService('reflectionProvider'),
            $this->getService('039'),
            $this->getService('036'),
            $this->getService('083'),
            $this->getParameter('featureToggles')['skipCheckGenericClasses'],
            $this->getParameter('checkMissingTypehints')
        );
    }

    public function createService036(): VarianceCheck
    {
        return new VarianceCheck;
    }

    public function createService037(): CrossCheckInterfacesHelper
    {
        return new CrossCheckInterfacesHelper;
    }

    public function createService038(): MethodTagTemplateTypeCheck
    {
        return new MethodTagTemplateTypeCheck($this->getService('0117'), $this->getService('040'));
    }

    public function createService039(): GenericObjectTypeCheck
    {
        return new GenericObjectTypeCheck;
    }

    public function createService040(): TemplateTypeCheck
    {
        return new TemplateTypeCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('039'),
            $this->getService('0339'),
            $this->getParameter('checkClassCaseSensitivity')
        );
    }

    public function createService041(): RuleLevelHelper
    {
        return new RuleLevelHelper(
            $this->getService('reflectionProvider'),
            $this->getParameter('checkNullables'),
            $this->getParameter('checkThisOnly'),
            $this->getParameter('checkUnionTypes'),
            $this->getParameter('checkExplicitMixed'),
            $this->getParameter('checkImplicitMixed'),
            $this->getParameter('checkBenevolentUnionTypes'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService042(): MethodParameterComparisonHelper
    {
        return new MethodParameterComparisonHelper($this->getService('09'));
    }

    public function createService043(): MethodSignatureRule
    {
        return new MethodSignatureRule(
            $this->getService('044'),
            $this->getParameter('reportMaybesInMethodSignatures'),
            $this->getParameter('reportStaticMethodSignatures'),
            $this->getParameter('featureToggles')['reportMethodPurityOverride']
        );
    }

    public function createService044(): ParentMethodHelper
    {
        return new ParentMethodHelper($this->getService('0508'));
    }

    public function createService045(): MethodVisibilityComparisonHelper
    {
        return new MethodVisibilityComparisonHelper;
    }

    public function createService046(): MethodPrototypeFinder
    {
        return new MethodPrototypeFinder($this->getService('09'), $this->getService('0508'));
    }

    public function createService047(): StaticMethodCallCheck
    {
        return new StaticMethodCallCheck(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getService('066'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('tips')['discoveringSymbols'],
            $this->getParameter('reportMagicMethods')
        );
    }

    public function createService048(): OverridingMethodCheck
    {
        return new OverridingMethodCheck;
    }

    public function createService049(): MethodCallCheck
    {
        return new MethodCallCheck(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('reportMagicMethods')
        );
    }

    public function createService050(): ParameterClosureTypeHelper
    {
        return new ParameterClosureTypeHelper(
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureTypeExtension')
        );
    }

    public function createService051(): NullsafeCheck
    {
        return new NullsafeCheck;
    }

    public function createService052(): FunctionDefinitionCheck
    {
        return new FunctionDefinitionCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('083'),
            $this->getService('09'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkThisOnly'),
            $this->getParameter('featureToggles')['checkImportedClassNameCase'],
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService053(): RestrictedStaticPropertyUsageRule
    {
        return new RestrictedStaticPropertyUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedPropertyUsageExtension'),
            $this->getService('reflectionProvider'),
            $this->getService('041')
        );
    }

    public function createService054(): RestrictedStaticMethodUsageRule
    {
        return new RestrictedStaticMethodUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider'),
            $this->getService('041')
        );
    }

    public function createService055(): RestrictedFunctionUsageRule
    {
        return new RestrictedFunctionUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedFunctionUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService056(): RestrictedMethodUsageRule
    {
        return new RestrictedMethodUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService057(): RestrictedStaticMethodCallableUsageRule
    {
        return new RestrictedStaticMethodCallableUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider'),
            $this->getService('041')
        );
    }

    public function createService058(): RestrictedClassConstantUsageRule
    {
        return new RestrictedClassConstantUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassConstantUsageExtension'),
            $this->getService('reflectionProvider'),
            $this->getService('041')
        );
    }

    public function createService059(): RestrictedUsageOfDeprecatedStringCastRule
    {
        return new RestrictedUsageOfDeprecatedStringCastRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService060(): RestrictedFunctionCallableUsageRule
    {
        return new RestrictedFunctionCallableUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedFunctionUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService061(): RestrictedPropertyUsageRule
    {
        return new RestrictedPropertyUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedPropertyUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService062(): RestrictedMethodCallableUsageRule
    {
        return new RestrictedMethodCallableUsageRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService063(): TooWideThrowTypeCheck
    {
        return new TooWideThrowTypeCheck($this->getParameter('exceptions')['implicitThrows']);
    }

    public function createService064(): DefaultExceptionTypeResolver
    {
        return new DefaultExceptionTypeResolver(
            $this->getService('reflectionProvider'),
            $this->getParameter('exceptions')['uncheckedExceptionRegexes'],
            $this->getParameter('exceptions')['uncheckedExceptionClasses'],
            $this->getParameter('exceptions')['checkedExceptionRegexes'],
            $this->getParameter('exceptions')['checkedExceptionClasses']
        );
    }

    public function createService065(): MissingCheckedExceptionInThrowsCheck
    {
        return new MissingCheckedExceptionInThrowsCheck($this->getService('exceptionTypeResolver'));
    }

    public function createService066(): ClassNameCheck
    {
        return new ClassNameCheck(
            $this->getService('019'),
            $this->getService('018'),
            $this->getService('reflectionProvider'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedClassNameUsageExtension')
        );
    }

    public function createService067(): MissingTypehintCheck
    {
        return new MissingTypehintCheck(
            $this->getParameter('checkMissingCallableSignature'),
            $this->getParameter('featureToggles')['skipCheckGenericClasses'],
            $this->getParameter('featureToggles')['checkGenericIterableClasses']
        );
    }

    public function createService068(): UnusedParametersCheck
    {
        return new UnusedParametersCheck;
    }

    public function createService069(): FunctionPurityCheck
    {
        return new FunctionPurityCheck;
    }

    public function createService070(): PossiblyPureCallTransitivePurityResolver
    {
        return new PossiblyPureCallTransitivePurityResolver($this->getService('reflectionProvider'));
    }

    public function createService071(): FunctionCallParametersCheck
    {
        return new FunctionCallParametersCheck(
            $this->getService('041'),
            $this->getService('051'),
            $this->getService('083'),
            $this->getService('096'),
            $this->getService('reflectionProvider'),
            $this->getService('050'),
            $this->getParameter('checkFunctionArgumentTypes'),
            $this->getParameter('checkArgumentsPassedByReference'),
            $this->getParameter('checkExtraArguments'),
            $this->getParameter('checkMissingTypehints')
        );
    }

    public function createService072(): TooWideParameterOutTypeCheck
    {
        return new TooWideParameterOutTypeCheck($this->getService('073'));
    }

    public function createService073(): TooWideTypeCheck
    {
        return new TooWideTypeCheck(
            $this->getService('096'),
            $this->getParameter('featureToggles')['reportTooWideBool'],
            $this->getParameter('featureToggles')['reportNestedTooWideType']
        );
    }

    public function createService074(): NonStringableDynamicAccessCheck
    {
        return new NonStringableDynamicAccessCheck(
            $this->getService('041'),
            $this->getParameter('featureToggles')['checkNonStringableDynamicAccess']
        );
    }

    public function createService075(): IssetCheck
    {
        return new IssetCheck(
            $this->getService('098'),
            $this->getParameter('checkAdvancedIsset'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService076(): PropertyTagCheck
    {
        return new PropertyTagCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('039'),
            $this->getService('067'),
            $this->getService('083'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkMissingTypehints'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService077(): LocalTypeAliasesCheck
    {
        return new LocalTypeAliasesCheck(
            $this->getParameter('typeAliases'),
            $this->getService('reflectionProvider'),
            $this->getService('0544'),
            $this->getService('067'),
            $this->getService('066'),
            $this->getService('083'),
            $this->getService('039'),
            $this->getParameter('checkMissingTypehints'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService078(): DuplicateDeclarationHelper
    {
        return new DuplicateDeclarationHelper;
    }

    public function createService079(): MethodTagCheck
    {
        return new MethodTagCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('039'),
            $this->getService('067'),
            $this->getService('083'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkMissingTypehints'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService080(): ConsistentConstructorHelper
    {
        return new ConsistentConstructorHelper;
    }

    public function createService081(): MixinCheck
    {
        return new MixinCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('039'),
            $this->getService('067'),
            $this->getService('083'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkMissingTypehints'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService082(): IncompatiblePhpDocTypeCheck
    {
        return new IncompatiblePhpDocTypeCheck(
            $this->getService('039'),
            $this->getService('083'),
            $this->getService('088')
        );
    }

    public function createService083(): UnresolvableTypeHelper
    {
        return new UnresolvableTypeHelper;
    }

    public function createService084(): AssertRuleHelper
    {
        return new AssertRuleHelper(
            $this->getService('reflectionProvider'),
            $this->getService('083'),
            $this->getService('066'),
            $this->getService('067'),
            $this->getService('039'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkMissingTypehints')
        );
    }

    public function createService085(): VarTagTypeRuleHelper
    {
        return new VarTagTypeRuleHelper(
            $this->getService('0544'),
            $this->getService('0117'),
            $this->getService('reflectionProvider'),
            $this->getParameter('reportWrongPhpDocTypeInVarTag'),
            $this->getParameter('reportAnyTypeWideningInVarTag'),
            $this->getService('0507')
        );
    }

    public function createService086(): ConditionalReturnTypeRuleHelper
    {
        return new ConditionalReturnTypeRuleHelper;
    }

    public function createService087(): RequireExtendsCheck
    {
        return new RequireExtendsCheck(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService088(): GenericCallableRuleHelper
    {
        return new GenericCallableRuleHelper($this->getService('040'));
    }

    public function createService089(): ApiClassNameUsageExtension
    {
        return new ApiClassNameUsageExtension($this->getService('090'));
    }

    public function createService090(): ApiRuleHelper
    {
        return new ApiRuleHelper;
    }

    public function createService091(): ApiMethodUsageExtension
    {
        return new ApiMethodUsageExtension($this->getService('090'));
    }

    public function createService092(): RuntimeReflectionFunctionUsageExtension
    {
        return new RuntimeReflectionFunctionUsageExtension;
    }

    public function createService093(): RuntimeReflectionInstantiationUsageExtension
    {
        return new RuntimeReflectionInstantiationUsageExtension;
    }

    public function createService094(): ApiClassConstantUsageExtension
    {
        return new ApiClassConstantUsageExtension($this->getService('090'));
    }

    public function createService095(): AccessStaticPropertiesCheck
    {
        return new AccessStaticPropertiesCheck(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getService('066'),
            $this->getService('09'),
            $this->getService('074'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService096(): PropertyReflectionFinder
    {
        return new PropertyReflectionFinder;
    }

    public function createService097(): AccessPropertiesCheck
    {
        return new AccessPropertiesCheck(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getService('09'),
            $this->getService('074'),
            $this->getParameter('reportMagicProperties'),
            $this->getParameter('checkDynamicProperties')
        );
    }

    public function createService098(): PropertyDescriptor
    {
        return new PropertyDescriptor;
    }

    public function createService099(): ParameterCastableToStringCheck
    {
        return new ParameterCastableToStringCheck($this->getService('041'));
    }

    public function createService0100(): FunctionReturnTypeCheck
    {
        return new FunctionReturnTypeCheck($this->getService('041'));
    }

    public function createService0101(): Registry
    {
        return $this->getService('0102')->create();
    }

    public function createService0102(): RegistryFactory
    {
        return new RegistryFactory($this->getService('phpstan.extensionsCollection.PHPStan.Collectors.Collector'));
    }

    public function createService0103(): Printer
    {
        return new Printer;
    }

    public function createService0104(): BootstrapFilesRunner
    {
        return new BootstrapFilesRunner($this->getService('012'), $this->getService('0528'));
    }

    public function createService0105(): AnalyserRunner
    {
        return new AnalyserRunner(
            $this->getService('05'),
            $this->getService('0500'),
            $this->getService('02'),
            $this->getService('0586'),
            $this->getService('0104')
        );
    }

    public function createService0106(): AnalyseApplication
    {
        return new AnalyseApplication(
            $this->getService('0104'),
            $this->getService('0105'),
            $this->getService('0481'),
            $this->getService('0549'),
            $this->getService('0732'),
            $this->getService('0491'),
            $this->getService('0543')
        );
    }

    public function createService0107(): CiDetectedErrorFormatter
    {
        return new CiDetectedErrorFormatter(
            $this->getService('errorFormatter.github'),
            $this->getService('errorFormatter.teamcity')
        );
    }

    public function createService0108(): FixerApplication
    {
        return new FixerApplication(
            $this->getService('0342'),
            $this->getService('0543'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('currentWorkingDirectory'),
            $this->getParameter('pro')['tmpDir'],
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getParameter('allConfigFiles'),
            $this->getParameter('cliAutoloadFile'),
            $this->getParameter('bootstrapFiles'),
            $this->getParameter('editorUrl'),
            $this->getParameter('usedLevel'),
            $this->getService('0116')
        );
    }

    public function createService0109(): FixerWorkerRunner
    {
        return new FixerWorkerRunner(
            $this->getParameter('allConfigFiles'),
            $this->getParameter('usedLevel'),
            $this->getService('0491'),
            $this->getService('0732'),
            $this->getService('0481'),
            $this->getService('02'),
            $this->getService('05'),
            $this->getService('0586')
        );
    }

    public function createService0110(): PhpClassAttributesWriter
    {
        return new PhpClassAttributesWriter;
    }

    public function createService0111(): Neon2AttributesMigrator
    {
        return new Neon2AttributesMigrator($this->getService('0103'), $this->getService('0110'));
    }

    public function createService0112(): TurboDiagnoseExtension
    {
        return new TurboDiagnoseExtension;
    }

    public function createService0113(): ErrorFixer
    {
        return new ErrorFixer($this->getService('0114'));
    }

    public function createService0114(): Patcher
    {
        return new Patcher;
    }

    public function createService0115(): PhpDocEditor
    {
        return new PhpDocEditor($this->getService('01077'));
    }

    public function createService0116(): HttpClientFactory
    {
        return new HttpClientFactory;
    }

    public function createService0117(): FileTypeMapper
    {
        return new FileTypeMapper(
            $this->getService('0516'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('0547'),
            $this->getService('0546'),
            $this->getService('0588'),
            $this->getService('0343'),
            $this->getService('015'),
            $this->getService('0346'),
            $this->getParameter('cache')['resolvedPhpDocBlockCacheCountMax'],
            $this->getParameter('cache')['nameScopeMapMemoryCacheCountMax']
        );
    }

    public function createService0118(): RegexExpressionHelper
    {
        return new RegexExpressionHelper($this->getService('0507'));
    }

    public function createService0119(): RegexGroupParser
    {
        return new RegexGroupParser($this->getService('09'), $this->getService('0118'));
    }

    public function createService0120(): OversizedArrayBuilder
    {
        return new OversizedArrayBuilder;
    }

    public function createService0121(): BitwiseFlagHelper
    {
        return new BitwiseFlagHelper($this->getService('reflectionProvider'));
    }

    public function createService0122(): ClosureTypeFactory
    {
        return new ClosureTypeFactory(
            $this->getService('0507'),
            $this->getService('01079'),
            $this->getService('betterReflectionReflector'),
            $this->getService('0516'),
            $this->getService('currentPhpVersionPhpParser')
        );
    }

    public function createService0123(): ArrayShiftFunctionReturnTypeExtension
    {
        return new ArrayShiftFunctionReturnTypeExtension;
    }

    public function createService0124(): CountFunctionReturnTypeExtension
    {
        return new CountFunctionReturnTypeExtension;
    }

    public function createService0125(): GetClassDynamicReturnTypeExtension
    {
        return new GetClassDynamicReturnTypeExtension;
    }

    public function createService0126(): PrintfFormatParser
    {
        return new PrintfFormatParser;
    }

    public function createService0127(): ConstantHelper
    {
        return new ConstantHelper;
    }

    public function createService0128(): DateIntervalFormatReturnTypeHelper
    {
        return new DateIntervalFormatReturnTypeHelper;
    }

    public function createService0129(): FilterFunctionsThrowTypeExtension
    {
        return new FilterFunctionsThrowTypeExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0176'),
            $this->getService('0260')
        );
    }

    public function createService0130(): GetParentClassDynamicFunctionReturnTypeExtension
    {
        return new GetParentClassDynamicFunctionReturnTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0131(): ArrayCountValuesDynamicReturnTypeExtension
    {
        return new ArrayCountValuesDynamicReturnTypeExtension;
    }

    public function createService0132(): OutputBufferingDynamicReturnTypeExtension
    {
        return new OutputBufferingDynamicReturnTypeExtension;
    }

    public function createService0133(): ArrayFillFunctionReturnTypeExtension
    {
        return new ArrayFillFunctionReturnTypeExtension;
    }

    public function createService0134(): ArrayCombineFunctionThrowTypeExtension
    {
        return new ArrayCombineFunctionThrowTypeExtension($this->getService('0312'));
    }

    public function createService0135(): XMLReaderOpenReturnTypeExtension
    {
        return new XMLReaderOpenReturnTypeExtension;
    }

    public function createService0136(): ArrayColumnHelper
    {
        return new ArrayColumnHelper;
    }

    public function createService0137(): GettimeofdayDynamicFunctionReturnTypeExtension
    {
        return new GettimeofdayDynamicFunctionReturnTypeExtension;
    }

    public function createService0138(): ClosureGetCurrentDynamicReturnTypeExtension
    {
        return new ClosureGetCurrentDynamicReturnTypeExtension;
    }

    public function createService0139(): FloatClassFunctionTypeSpecifyingExtension
    {
        return new FloatClassFunctionTypeSpecifyingExtension;
    }

    public function createService0140(): IsAFunctionTypeSpecifyingExtension
    {
        return new IsAFunctionTypeSpecifyingExtension($this->getService('0293'));
    }

    public function createService0141(): GetCalledClassDynamicReturnTypeExtension
    {
        return new GetCalledClassDynamicReturnTypeExtension;
    }

    public function createService0142(): OpensslCipherFunctionsReturnTypeExtension
    {
        return new OpensslCipherFunctionsReturnTypeExtension($this->getService('0178'));
    }

    public function createService0143(): ParseUrlFunctionDynamicReturnTypeExtension
    {
        return new ParseUrlFunctionDynamicReturnTypeExtension;
    }

    public function createService0144(): StrSplitFunctionThrowTypeExtension
    {
        return new StrSplitFunctionThrowTypeExtension;
    }

    public function createService0145(): SimpleXMLElementAsXMLMethodReturnTypeExtension
    {
        return new SimpleXMLElementAsXMLMethodReturnTypeExtension;
    }

    public function createService0146(): GetDefinedVarsFunctionReturnTypeExtension
    {
        return new GetDefinedVarsFunctionReturnTypeExtension;
    }

    public function createService0147(): AbsFunctionDynamicReturnTypeExtension
    {
        return new AbsFunctionDynamicReturnTypeExtension;
    }

    public function createService0148(): ArrayIntersectKeyFunctionReturnTypeExtension
    {
        return new ArrayIntersectKeyFunctionReturnTypeExtension;
    }

    public function createService0149(): DateTimeSubMethodThrowTypeExtension
    {
        return new DateTimeSubMethodThrowTypeExtension;
    }

    public function createService0150(): InArrayFunctionTypeSpecifyingExtension
    {
        return new InArrayFunctionTypeSpecifyingExtension;
    }

    public function createService0151(): ArrayChunkFunctionReturnTypeExtension
    {
        return new ArrayChunkFunctionReturnTypeExtension;
    }

    public function createService0152(): FilterVarDynamicReturnTypeExtension
    {
        return new FilterVarDynamicReturnTypeExtension($this->getService('0176'));
    }

    public function createService0153(): TriggerErrorFunctionThrowTypeExtension
    {
        return new TriggerErrorFunctionThrowTypeExtension($this->getParameter('exceptions')['implicitThrows']);
    }

    public function createService0154(): TrimFunctionDynamicReturnTypeExtension
    {
        return new TrimFunctionDynamicReturnTypeExtension($this->getService('0157'));
    }

    public function createService0155(): PgLastNoticeDynamicReturnTypeExtension
    {
        return new PgLastNoticeDynamicReturnTypeExtension;
    }

    public function createService0156(): FunctionExistsFunctionTypeSpecifyingExtension
    {
        return new FunctionExistsFunctionTypeSpecifyingExtension;
    }

    public function createService0157(): TrimCharactersHelper
    {
        return new TrimCharactersHelper;
    }

    public function createService0158(): PregSplitDynamicReturnTypeExtension
    {
        return new PregSplitDynamicReturnTypeExtension($this->getService('0121'));
    }

    public function createService0159(): FloatClassFunctionReturnTypeExtension
    {
        return new FloatClassFunctionReturnTypeExtension;
    }

    public function createService0160(): SetTypeFunctionTypeSpecifyingExtension
    {
        return new SetTypeFunctionTypeSpecifyingExtension;
    }

    public function createService0161(): ArrayFilterFunctionReturnTypeHelper
    {
        return new ArrayFilterFunctionReturnTypeHelper($this->getService('reflectionProvider'));
    }

    public function createService0162(): VersionCompareFunctionDynamicReturnTypeExtension
    {
        return new VersionCompareFunctionDynamicReturnTypeExtension($this->getService('07'));
    }

    public function createService0163(): JsonThrowTypeExtension
    {
        return new JsonThrowTypeExtension($this->getService('reflectionProvider'), $this->getService('0121'));
    }

    public function createService0164(): AssertThrowTypeExtension
    {
        return new AssertThrowTypeExtension;
    }

    public function createService0165(): SimpleXMLElementXpathMethodReturnTypeExtension
    {
        return new SimpleXMLElementXpathMethodReturnTypeExtension;
    }

    public function createService0166(): GettypeFunctionReturnTypeExtension
    {
        return new GettypeFunctionReturnTypeExtension;
    }

    public function createService0167(): ReflectionPropertyConstructorThrowTypeExtension
    {
        return new ReflectionPropertyConstructorThrowTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0168(): DomDocumentCreateElementDynamicThrowTypeExtension
    {
        return new DomDocumentCreateElementDynamicThrowTypeExtension;
    }

    public function createService0169(): RandomizerMethodReturnTypeExtension
    {
        return new RandomizerMethodReturnTypeExtension;
    }

    public function createService0170(): ArrayCurrentDynamicReturnTypeExtension
    {
        return new ArrayCurrentDynamicReturnTypeExtension;
    }

    public function createService0171(): ArrayCombineFunctionReturnTypeExtension
    {
        return new ArrayCombineFunctionReturnTypeExtension($this->getService('0312'));
    }

    public function createService0172(): DomDocumentCreateElementDynamicReturnTypeExtension
    {
        return new DomDocumentCreateElementDynamicReturnTypeExtension;
    }

    public function createService0173(): SimpleXMLElementClassPropertyReflectionExtension
    {
        return new SimpleXMLElementClassPropertyReflectionExtension;
    }

    public function createService0174(): BackedEnumFromMethodDynamicReturnTypeExtension
    {
        return new BackedEnumFromMethodDynamicReturnTypeExtension;
    }

    public function createService0175(): GetDebugTypeFunctionReturnTypeExtension
    {
        return new GetDebugTypeFunctionReturnTypeExtension;
    }

    public function createService0176(): FilterFunctionReturnTypeHelper
    {
        return new FilterFunctionReturnTypeHelper($this->getService('reflectionProvider'));
    }

    public function createService0177(): DateFunctionReturnTypeExtension
    {
        return new DateFunctionReturnTypeExtension($this->getService('0325'));
    }

    public function createService0178(): OpenSslCipherMethodsProvider
    {
        return new OpenSslCipherMethodsProvider;
    }

    public function createService0179(): GmpOperatorTypeSpecifyingExtension
    {
        return new GmpOperatorTypeSpecifyingExtension;
    }

    public function createService0180(): BcMathStringOrNullReturnTypeExtension
    {
        return new BcMathStringOrNullReturnTypeExtension;
    }

    public function createService0181(): StatDynamicReturnTypeExtension
    {
        return new StatDynamicReturnTypeExtension;
    }

    public function createService0182(): ClosureFromCallableDynamicReturnTypeExtension
    {
        return new ClosureFromCallableDynamicReturnTypeExtension;
    }

    public function createService0183(): ArrayChunkFunctionThrowTypeExtension
    {
        return new ArrayChunkFunctionThrowTypeExtension;
    }

    public function createService0184(): IdateFunctionReturnTypeHelper
    {
        return new IdateFunctionReturnTypeHelper;
    }

    public function createService0185(): DateIntervalFormatDynamicReturnTypeExtension
    {
        return new DateIntervalFormatDynamicReturnTypeExtension($this->getService('0128'));
    }

    public function createService0186(): ArrayKeysFunctionDynamicReturnTypeExtension
    {
        return new ArrayKeysFunctionDynamicReturnTypeExtension;
    }

    public function createService0187(): ArrayColumnFunctionReturnTypeExtension
    {
        return new ArrayColumnFunctionReturnTypeExtension($this->getService('0136'));
    }

    public function createService0188(): DateFormatFunctionReturnTypeExtension
    {
        return new DateFormatFunctionReturnTypeExtension($this->getService('0325'));
    }

    public function createService0189(): PathinfoFunctionDynamicReturnTypeExtension
    {
        return new PathinfoFunctionDynamicReturnTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0190(): StrRepeatFunctionReturnTypeExtension
    {
        return new StrRepeatFunctionReturnTypeExtension;
    }

    public function createService0191(): ReplaceFunctionsDynamicReturnTypeExtension
    {
        return new ReplaceFunctionsDynamicReturnTypeExtension;
    }

    public function createService0192(): DatePeriodConstructorReturnTypeExtension
    {
        return new DatePeriodConstructorReturnTypeExtension;
    }

    public function createService0193(): DateIntervalConstructorThrowTypeExtension
    {
        return new DateIntervalConstructorThrowTypeExtension;
    }

    public function createService0194(): CountFunctionTypeSpecifyingExtension
    {
        return new CountFunctionTypeSpecifyingExtension;
    }

    public function createService0195(): VersionCompareFunctionDynamicThrowTypeExtension
    {
        return new VersionCompareFunctionDynamicThrowTypeExtension;
    }

    public function createService0196(): DateTimeZoneConstructorThrowTypeExtension
    {
        return new DateTimeZoneConstructorThrowTypeExtension;
    }

    public function createService0197(): ClassExistsFunctionTypeSpecifyingExtension
    {
        return new ClassExistsFunctionTypeSpecifyingExtension($this->getService('reflectionProvider'));
    }

    public function createService0198(): LocaltimeFunctionDynamicReturnTypeExtension
    {
        return new LocaltimeFunctionDynamicReturnTypeExtension;
    }

    public function createService0199(): ClassImplementsFunctionReturnTypeExtension
    {
        return new ClassImplementsFunctionReturnTypeExtension;
    }

    public function createService0200(): StrCaseFunctionsReturnTypeExtension
    {
        return new StrCaseFunctionsReturnTypeExtension;
    }

    public function createService0201(): MbFunctionsReturnTypeExtension
    {
        return new MbFunctionsReturnTypeExtension;
    }

    public function createService0202(): PregFilterFunctionReturnTypeExtension
    {
        return new PregFilterFunctionReturnTypeExtension;
    }

    public function createService0203(): FmodFunctionReturnTypeExtension
    {
        return new FmodFunctionReturnTypeExtension;
    }

    public function createService0204(): AssertFunctionTypeSpecifyingExtension
    {
        return new AssertFunctionTypeSpecifyingExtension;
    }

    public function createService0205(): MbConvertEncodingFunctionReturnTypeExtension
    {
        return new MbConvertEncodingFunctionReturnTypeExtension;
    }

    public function createService0206(): FilterInputDynamicReturnTypeExtension
    {
        return new FilterInputDynamicReturnTypeExtension($this->getService('0176'));
    }

    public function createService0207(): DefinedConstantTypeSpecifyingExtension
    {
        return new DefinedConstantTypeSpecifyingExtension($this->getService('0127'));
    }

    public function createService0208(): ArrayNextDynamicReturnTypeExtension
    {
        return new ArrayNextDynamicReturnTypeExtension;
    }

    public function createService0209(): RandomIntFunctionReturnTypeExtension
    {
        return new RandomIntFunctionReturnTypeExtension;
    }

    public function createService0210(): StrlenFunctionTypeSpecifyingExtension
    {
        return new StrlenFunctionTypeSpecifyingExtension;
    }

    public function createService0211(): MicrotimeFunctionReturnTypeExtension
    {
        return new MicrotimeFunctionReturnTypeExtension;
    }

    public function createService0212(): StrWordCountFunctionDynamicReturnTypeExtension
    {
        return new StrWordCountFunctionDynamicReturnTypeExtension;
    }

    public function createService0213(): SubstrDynamicReturnTypeExtension
    {
        return new SubstrDynamicReturnTypeExtension;
    }

    public function createService0214(): ArrayWalkParameterClosureTypeExtension
    {
        return new ArrayWalkParameterClosureTypeExtension;
    }

    public function createService0215(): PropertyExistsTypeSpecifyingExtension
    {
        return new PropertyExistsTypeSpecifyingExtension($this->getService('096'));
    }

    public function createService0216(): ParseStrParameterOutTypeExtension
    {
        return new ParseStrParameterOutTypeExtension;
    }

    public function createService0217(): DioStatDynamicFunctionReturnTypeExtension
    {
        return new DioStatDynamicFunctionReturnTypeExtension;
    }

    public function createService0218(): ArrayFindFunctionReturnTypeExtension
    {
        return new ArrayFindFunctionReturnTypeExtension($this->getService('0161'));
    }

    public function createService0219(): ArrayFlipFunctionReturnTypeExtension
    {
        return new ArrayFlipFunctionReturnTypeExtension;
    }

    public function createService0220(): MinMaxFunctionThrowTypeExtension
    {
        return new MinMaxFunctionThrowTypeExtension;
    }

    public function createService0221(): StrvalFamilyFunctionReturnTypeExtension
    {
        return new StrvalFamilyFunctionReturnTypeExtension;
    }

    public function createService0222(): IntdivThrowTypeExtension
    {
        return new IntdivThrowTypeExtension;
    }

    public function createService0223(): ArrayFilterParameterClosureTypeExtension
    {
        return new ArrayFilterParameterClosureTypeExtension;
    }

    public function createService0224(): NonEmptyStringFunctionsReturnTypeExtension
    {
        return new NonEmptyStringFunctionsReturnTypeExtension;
    }

    public function createService0225(): ArrayReverseFunctionReturnTypeExtension
    {
        return new ArrayReverseFunctionReturnTypeExtension;
    }

    public function createService0226(): TriggerErrorDynamicReturnTypeExtension
    {
        return new TriggerErrorDynamicReturnTypeExtension;
    }

    public function createService0227(): ArrayMapFunctionReturnTypeExtension
    {
        return new ArrayMapFunctionReturnTypeExtension;
    }

    public function createService0228(): ClampFunctionReturnTypeExtension
    {
        return new ClampFunctionReturnTypeExtension;
    }

    public function createService0229(): ArrayKeyDynamicReturnTypeExtension
    {
        return new ArrayKeyDynamicReturnTypeExtension;
    }

    public function createService0230(): DateTimeConstructorThrowTypeExtension
    {
        return new DateTimeConstructorThrowTypeExtension;
    }

    public function createService0231(): NumberFormatFunctionDynamicReturnTypeExtension
    {
        return new NumberFormatFunctionDynamicReturnTypeExtension;
    }

    public function createService0232(): ArraySearchFunctionTypeSpecifyingExtension
    {
        return new ArraySearchFunctionTypeSpecifyingExtension;
    }

    public function createService0233(): JsonThrowOnErrorDynamicReturnTypeExtension
    {
        return new JsonThrowOnErrorDynamicReturnTypeExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0121')
        );
    }

    public function createService0234(): Base64DecodeDynamicFunctionReturnTypeExtension
    {
        return new Base64DecodeDynamicFunctionReturnTypeExtension;
    }

    public function createService0235(): ArraySearchFunctionDynamicReturnTypeExtension
    {
        return new ArraySearchFunctionDynamicReturnTypeExtension;
    }

    public function createService0236(): GetClassFunctionThrowTypeExtension
    {
        return new GetClassFunctionThrowTypeExtension;
    }

    public function createService0237(): ClosureBindDynamicReturnTypeExtension
    {
        return new ClosureBindDynamicReturnTypeExtension;
    }

    public function createService0238(): OpenSslEncryptParameterOutTypeExtension
    {
        return new OpenSslEncryptParameterOutTypeExtension($this->getService('0178'));
    }

    public function createService0239(): RoundFunctionThrowTypeExtension
    {
        return new RoundFunctionThrowTypeExtension;
    }

    public function createService0240(): HighlightStringDynamicReturnTypeExtension
    {
        return new HighlightStringDynamicReturnTypeExtension;
    }

    public function createService0241(): SscanfFunctionDynamicReturnTypeExtension
    {
        return new SscanfFunctionDynamicReturnTypeExtension;
    }

    public function createService0242(): MbSubstituteCharacterDynamicReturnTypeExtension
    {
        return new MbSubstituteCharacterDynamicReturnTypeExtension;
    }

    public function createService0243(): ClosureBindToDynamicReturnTypeExtension
    {
        return new ClosureBindToDynamicReturnTypeExtension;
    }

    public function createService0244(): FilterVarArrayDynamicReturnTypeExtension
    {
        return new FilterVarArrayDynamicReturnTypeExtension(
            $this->getService('0176'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0245(): ArgumentBasedFunctionReturnTypeExtension
    {
        return new ArgumentBasedFunctionReturnTypeExtension;
    }

    public function createService0246(): ArrayRandFunctionReturnTypeExtension
    {
        return new ArrayRandFunctionReturnTypeExtension;
    }

    public function createService0247(): BcMathNumberUnaryOperatorTypeSpecifyingExtension
    {
        return new BcMathNumberUnaryOperatorTypeSpecifyingExtension($this->getService('09'));
    }

    public function createService0248(): IntdivFunctionReturnTypeExtension
    {
        return new IntdivFunctionReturnTypeExtension($this->getService('09'));
    }

    public function createService0249(): RoundFunctionReturnTypeExtension
    {
        return new RoundFunctionReturnTypeExtension;
    }

    public function createService0250(): StrlenFunctionReturnTypeExtension
    {
        return new StrlenFunctionReturnTypeExtension;
    }

    public function createService0251(): ArraySliceFunctionReturnTypeExtension
    {
        return new ArraySliceFunctionReturnTypeExtension;
    }

    public function createService0252(): SqrtFunctionReturnTypeExtension
    {
        return new SqrtFunctionReturnTypeExtension;
    }

    public function createService0253(): ArrayFirstLastDynamicReturnTypeExtension
    {
        return new ArrayFirstLastDynamicReturnTypeExtension;
    }

    public function createService0254(): IsArrayFunctionTypeSpecifyingExtension
    {
        return new IsArrayFunctionTypeSpecifyingExtension;
    }

    public function createService0255(): DateIntervalCreateFromDateStringThrowTypeExtension
    {
        return new DateIntervalCreateFromDateStringThrowTypeExtension;
    }

    public function createService0256(): ReflectionClassConstantConstructorThrowTypeExtension
    {
        return new ReflectionClassConstantConstructorThrowTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0257(): DateTimeModifyMethodThrowTypeExtension
    {
        return new DateTimeModifyMethodThrowTypeExtension;
    }

    public function createService0258(): ArrayFillKeysFunctionReturnTypeExtension
    {
        return new ArrayFillKeysFunctionReturnTypeExtension;
    }

    public function createService0259(): DateTimeDynamicReturnTypeExtension
    {
        return new DateTimeDynamicReturnTypeExtension;
    }

    public function createService0260(): FilterFunctionFlagsHelper
    {
        return new FilterFunctionFlagsHelper;
    }

    public function createService0261(): ArrayReplaceFunctionReturnTypeExtension
    {
        return new ArrayReplaceFunctionReturnTypeExtension;
    }

    public function createService0262(): ArrayMergeFunctionDynamicReturnTypeExtension
    {
        return new ArrayMergeFunctionDynamicReturnTypeExtension;
    }

    public function createService0263(): ReflectionClassIsSubclassOfTypeSpecifyingExtension
    {
        return new ReflectionClassIsSubclassOfTypeSpecifyingExtension;
    }

    public function createService0264(): ArrayKeyExistsFunctionTypeSpecifyingExtension
    {
        return new ArrayKeyExistsFunctionTypeSpecifyingExtension;
    }

    public function createService0265(): ThrowableReturnTypeExtension
    {
        return new ThrowableReturnTypeExtension;
    }

    public function createService0266(): IteratorToArrayFunctionReturnTypeExtension
    {
        return new IteratorToArrayFunctionReturnTypeExtension;
    }

    public function createService0267(): IdateFunctionReturnTypeExtension
    {
        return new IdateFunctionReturnTypeExtension($this->getService('0184'));
    }

    public function createService0268(): ExplodeFunctionDynamicReturnTypeExtension
    {
        return new ExplodeFunctionDynamicReturnTypeExtension;
    }

    public function createService0269(): ArrayPointerFunctionsDynamicReturnTypeExtension
    {
        return new ArrayPointerFunctionsDynamicReturnTypeExtension;
    }

    public function createService0270(): UnserializeFunctionThrowTypeExtension
    {
        return new UnserializeFunctionThrowTypeExtension;
    }

    public function createService0271(): IniGetReturnTypeExtension
    {
        return new IniGetReturnTypeExtension;
    }

    public function createService0272(): StrrevFunctionReturnTypeExtension
    {
        return new StrrevFunctionReturnTypeExtension;
    }

    public function createService0273(): MinMaxFunctionReturnTypeExtension
    {
        return new MinMaxFunctionReturnTypeExtension;
    }

    public function createService0274(): DateIntervalFormatFunctionReturnTypeExtension
    {
        return new DateIntervalFormatFunctionReturnTypeExtension($this->getService('0128'));
    }

    public function createService0275(): ArrayPopFunctionReturnTypeExtension
    {
        return new ArrayPopFunctionReturnTypeExtension;
    }

    public function createService0276(): PregMatchParameterOutTypeExtension
    {
        return new PregMatchParameterOutTypeExtension($this->getService('0286'));
    }

    public function createService0277(): StrIncrementDecrementFunctionReturnTypeExtension
    {
        return new StrIncrementDecrementFunctionReturnTypeExtension;
    }

    public function createService0278(): PgDmlDynamicReturnTypeExtension
    {
        return new PgDmlDynamicReturnTypeExtension($this->getService('0121'));
    }

    public function createService0279(): CountCharsFunctionDynamicReturnTypeExtension
    {
        return new CountCharsFunctionDynamicReturnTypeExtension;
    }

    public function createService0280(): PregMatchTypeSpecifyingExtension
    {
        return new PregMatchTypeSpecifyingExtension($this->getService('0286'));
    }

    public function createService0281(): ArrayChangeKeyCaseFunctionReturnTypeExtension
    {
        return new ArrayChangeKeyCaseFunctionReturnTypeExtension;
    }

    public function createService0282(): IsIterableFunctionTypeSpecifyingExtension
    {
        return new IsIterableFunctionTypeSpecifyingExtension;
    }

    public function createService0283(): StrContainingTypeSpecifyingExtension
    {
        return new StrContainingTypeSpecifyingExtension;
    }

    public function createService0284(): StrSplitFunctionReturnTypeExtension
    {
        return new StrSplitFunctionReturnTypeExtension;
    }

    public function createService0285(): ArraySumFunctionDynamicReturnTypeExtension
    {
        return new ArraySumFunctionDynamicReturnTypeExtension;
    }

    public function createService0286(): RegexArrayShapeMatcher
    {
        return new RegexArrayShapeMatcher(
            $this->getService('0119'),
            $this->getService('0118'),
            $this->getService('09')
        );
    }

    public function createService0287(): DsMapDynamicReturnTypeExtension
    {
        return new DsMapDynamicReturnTypeExtension;
    }

    public function createService0288(): ReflectionFunctionConstructorThrowTypeExtension
    {
        return new ReflectionFunctionConstructorThrowTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0289(): IsSubclassOfFunctionTypeSpecifyingExtension
    {
        return new IsSubclassOfFunctionTypeSpecifyingExtension($this->getService('0293'));
    }

    public function createService0290(): ArrayReduceFunctionReturnTypeExtension
    {
        return new ArrayReduceFunctionReturnTypeExtension;
    }

    public function createService0291(): PrintfFunctionThrowTypeExtension
    {
        return new PrintfFunctionThrowTypeExtension($this->getService('0126'));
    }

    public function createService0292(): ArrayObjectConstructorReturnTypeExtension
    {
        return new ArrayObjectConstructorReturnTypeExtension;
    }

    public function createService0293(): IsAFunctionTypeSpecifyingHelper
    {
        return new IsAFunctionTypeSpecifyingHelper;
    }

    public function createService0294(): ArraySpliceFunctionReturnTypeExtension
    {
        return new ArraySpliceFunctionReturnTypeExtension;
    }

    public function createService0295(): HashFunctionsReturnTypeExtension
    {
        return new HashFunctionsReturnTypeExtension;
    }

    public function createService0296(): GmpUnaryOperatorTypeSpecifyingExtension
    {
        return new GmpUnaryOperatorTypeSpecifyingExtension;
    }

    public function createService0297(): ArrayMapParameterClosureTypeExtension
    {
        return new ArrayMapParameterClosureTypeExtension;
    }

    public function createService0298(): ImplodeFunctionReturnTypeExtension
    {
        return new ImplodeFunctionReturnTypeExtension;
    }

    public function createService0299(): CurlGetinfoFunctionDynamicReturnTypeExtension
    {
        return new CurlGetinfoFunctionDynamicReturnTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0300(): SprintfFunctionDynamicReturnTypeExtension
    {
        return new SprintfFunctionDynamicReturnTypeExtension;
    }

    public function createService0301(): ReflectionMethodConstructorThrowTypeExtension
    {
        return new ReflectionMethodConstructorThrowTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0302(): ArrayFindKeyFunctionReturnTypeExtension
    {
        return new ArrayFindKeyFunctionReturnTypeExtension;
    }

    public function createService0303(): MethodExistsTypeSpecifyingExtension
    {
        return new MethodExistsTypeSpecifyingExtension;
    }

    public function createService0304(): PgResultStatusDynamicReturnTypeExtension
    {
        return new PgResultStatusDynamicReturnTypeExtension;
    }

    public function createService0305(): StrPadFunctionReturnTypeExtension
    {
        return new StrPadFunctionReturnTypeExtension;
    }

    public function createService0306(): DsMapDynamicMethodThrowTypeExtension
    {
        return new DsMapDynamicMethodThrowTypeExtension;
    }

    public function createService0307(): ArrayPadDynamicReturnTypeExtension
    {
        return new ArrayPadDynamicReturnTypeExtension;
    }

    public function createService0308(): DateFormatMethodReturnTypeExtension
    {
        return new DateFormatMethodReturnTypeExtension($this->getService('0325'));
    }

    public function createService0309(): CtypeDigitFunctionTypeSpecifyingExtension
    {
        return new CtypeDigitFunctionTypeSpecifyingExtension;
    }

    public function createService0310(): ArrayFilterFunctionReturnTypeExtension
    {
        return new ArrayFilterFunctionReturnTypeExtension($this->getService('0161'));
    }

    public function createService0311(): DateIntervalDynamicReturnTypeExtension
    {
        return new DateIntervalDynamicReturnTypeExtension;
    }

    public function createService0312(): ArrayCombineHelper
    {
        return new ArrayCombineHelper;
    }

    public function createService0313(): MbStrlenFunctionReturnTypeExtension
    {
        return new MbStrlenFunctionReturnTypeExtension;
    }

    public function createService0314(): SimpleXMLElementConstructorThrowTypeExtension
    {
        return new SimpleXMLElementConstructorThrowTypeExtension;
    }

    public function createService0315(): ArrayValuesFunctionDynamicReturnTypeExtension
    {
        return new ArrayValuesFunctionDynamicReturnTypeExtension;
    }

    public function createService0316(): StrShuffleFunctionReturnTypeExtension
    {
        return new StrShuffleFunctionReturnTypeExtension;
    }

    public function createService0317(): IsCallableFunctionTypeSpecifyingExtension
    {
        return new IsCallableFunctionTypeSpecifyingExtension($this->getService('0303'));
    }

    public function createService0318(): HrtimeFunctionReturnTypeExtension
    {
        return new HrtimeFunctionReturnTypeExtension;
    }

    public function createService0319(): PregReplaceCallbackClosureTypeExtension
    {
        return new PregReplaceCallbackClosureTypeExtension($this->getService('0286'));
    }

    public function createService0320(): StrtotimeFunctionReturnTypeExtension
    {
        return new StrtotimeFunctionReturnTypeExtension;
    }

    public function createService0321(): ConstantFunctionReturnTypeExtension
    {
        return new ConstantFunctionReturnTypeExtension($this->getService('0127'));
    }

    public function createService0322(): PowFunctionReturnTypeExtension
    {
        return new PowFunctionReturnTypeExtension;
    }

    public function createService0323(): ArrayFindParameterClosureTypeExtension
    {
        return new ArrayFindParameterClosureTypeExtension;
    }

    public function createService0324(): BcMathNumberOperatorTypeSpecifyingExtension
    {
        return new BcMathNumberOperatorTypeSpecifyingExtension($this->getService('09'));
    }

    public function createService0325(): DateFunctionReturnTypeHelper
    {
        return new DateFunctionReturnTypeHelper;
    }

    public function createService0326(): PDOConnectReturnTypeExtension
    {
        return new PDOConnectReturnTypeExtension($this->getService('09'));
    }

    public function createService0327(): DateTimeCreateDynamicReturnTypeExtension
    {
        return new DateTimeCreateDynamicReturnTypeExtension;
    }

    public function createService0328(): CompactFunctionReturnTypeExtension
    {
        return new CompactFunctionReturnTypeExtension($this->getParameter('checkMaybeUndefinedVariables'));
    }

    public function createService0329(): RangeFunctionReturnTypeExtension
    {
        return new RangeFunctionReturnTypeExtension;
    }

    public function createService0330(): DefineConstantTypeSpecifyingExtension
    {
        return new DefineConstantTypeSpecifyingExtension;
    }

    public function createService0331(): LtrimFunctionReturnTypeExtension
    {
        return new LtrimFunctionReturnTypeExtension($this->getService('0157'));
    }

    public function createService0332(): ReflectionClassConstructorThrowTypeExtension
    {
        return new ReflectionClassConstructorThrowTypeExtension;
    }

    public function createService0333(): StrTokFunctionReturnTypeExtension
    {
        return new StrTokFunctionReturnTypeExtension;
    }

    public function createService0334(): ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension
    {
        return new ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension;
    }

    public function createService0335(): DynamicReturnTypeExtensionRegistry
    {
        return new DynamicReturnTypeExtensionRegistry(
            $this->getService('reflectionProvider'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicMethodReturnTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodReturnTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionReturnTypeExtension')
        );
    }

    public function createService0336(): ArrayUnpackingHelper
    {
        return new ArrayUnpackingHelper($this->getService('09'));
    }

    public function createService0337(): OperatorTypeSpecifyingExtensionRegistry
    {
        return new OperatorTypeSpecifyingExtensionRegistry($this->getService('phpstan.extensionsCollection.PHPStan.Type.OperatorTypeSpecifyingExtension'));
    }

    public function createService0338(): TypeAliasResolverProvider
    {
        return new LazyTypeAliasResolverProvider($this->getService('012'));
    }

    public function createService0339(): TypeAliasResolver
    {
        return new UsefulTypeAliasResolver(
            $this->getParameter('typeAliases'),
            $this->getService('0553'),
            $this->getService('0544'),
            $this->getService('reflectionProvider'),
            $this->getParameter('cache')['resolvedLocalTypeAliasesCountMax']
        );
    }

    public function createService0340(): UnaryOperatorTypeSpecifyingExtensionRegistry
    {
        return new UnaryOperatorTypeSpecifyingExtensionRegistry($this->getService('phpstan.extensionsCollection.PHPStan.Type.UnaryOperatorTypeSpecifyingExtension'));
    }

    public function createService0341(): IncludedFilePathResolver
    {
        return new IncludedFilePathResolver($this->getParameter('currentWorkingDirectory'), $this->getService('0343'));
    }

    public function createService0342(): FileMonitorFactory
    {
        return new FileMonitorFactory(
            $this->getService('0345'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('analysedPathsFromConfig'),
            $this->getParameter('scanDirectories')
        );
    }

    public function createService0343(): FileHelper
    {
        return new FileHelper($this->getParameter('currentWorkingDirectory'));
    }

    public function createService0344(): DirectoryWalker
    {
        return new DirectoryWalker($this->getService('0348'), $this->getParameter('tmpDir'));
    }

    public function createService0345(): HashingFileMonitor
    {
        return new HashingFileMonitor(
            $this->getService('fileFinderAnalyse'),
            $this->getService('fileFinderScan'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('analysedPathsFromConfig'),
            $this->getParameter('scanFiles'),
            $this->getParameter('scanDirectories'),
            $this->getService('0344')
        );
    }

    public function createService0346(): FileContentHasher
    {
        return new FileContentHasher;
    }

    public function createService0347(): DeduplicatingFileReader
    {
        return new DeduplicatingFileReader;
    }

    public function createService0348(): FileStatSignatures
    {
        return new FileStatSignatures;
    }

    public function createService0349(): FileExcluderFactory
    {
        return new FileExcluderFactory($this->getService('0729'), $this->getParameter('excludePaths'));
    }

    public function createService0350(): BooleanNotHandler
    {
        return new BooleanNotHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0351(): ShellExecHandler
    {
        return new ShellExecHandler(
            $this->getService('0383'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0352(): EmptyHandler
    {
        return new EmptyHandler(
            $this->getService('0398'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0393')
        );
    }

    public function createService0353(): PreIncHandler
    {
        return new PreIncHandler(
            $this->getService('0730'),
            $this->getService('0390'),
            $this->getService('0395'),
            $this->getService('0354')
        );
    }

    public function createService0354(): AssignHandler
    {
        return new AssignHandler(
            $this->getService('0473'),
            $this->getService('0432'),
            $this->getService('0540'),
            $this->getService('0355'),
            $this->getService('0360'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0381'),
            $this->getService('096'),
            $this->getService('0392'),
            $this->getService('0398'),
            $this->getService('0406'),
            $this->getService('0358'),
            $this->getService('0423'),
            $this->getService('0419'),
            $this->getService('0387'),
            $this->getService('0478'),
            $this->getService('0477'),
            $this->getService('0336'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0355(): MatchHandler
    {
        return new MatchHandler(
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0381'),
            $this->getService('0479')
        );
    }

    public function createService0356(): PostDecHandler
    {
        return new PostDecHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0390'),
            $this->getService('0354')
        );
    }

    public function createService0357(): NullsafePropertyFetchHandler
    {
        return new NullsafePropertyFetchHandler(
            $this->getService('0398'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0393')
        );
    }

    public function createService0358(): ArrayDimFetchHandler
    {
        return new ArrayDimFetchHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0387'),
            $this->getService('0399')
        );
    }

    public function createService0359(): ExitHandler
    {
        return new ExitHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0360(): TernaryHandler
    {
        return new TernaryHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0393'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0361(): UnaryMinusHandler
    {
        return new UnaryMinusHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0362(): ClosureHandler
    {
        return new ClosureHandler(
            $this->getService('0384'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0471'),
            $this->getService('0472')
        );
    }

    public function createService0363(): InstanceofHandler
    {
        return new InstanceofHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0364(): PipeHandler
    {
        return new PipeHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0365(): YieldFromHandler
    {
        return new YieldFromHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0366(): IncludeHandler
    {
        return new IncludeHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0341')
        );
    }

    public function createService0367(): CoalesceHandler
    {
        return new CoalesceHandler(
            $this->getService('0398'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0389')
        );
    }

    public function createService0368(): NativeTypeExprHandler
    {
        return new NativeTypeExprHandler($this->getService('0392'));
    }

    public function createService0369(): TypeExprHandler
    {
        return new TypeExprHandler($this->getService('0392'));
    }

    public function createService0370(): InstantiationCallableNodeHandler
    {
        return new InstantiationCallableNodeHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0507')
        );
    }

    public function createService0371(): MethodCallableNodeHandler
    {
        return new MethodCallableNodeHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0507')
        );
    }

    public function createService0372(): UnsetOffsetExprHandler
    {
        return new UnsetOffsetExprHandler($this->getService('0392'));
    }

    public function createService0373(): StaticMethodCallableNodeHandler
    {
        return new StaticMethodCallableNodeHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0507'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0374(): FunctionCallableNodeHandler
    {
        return new FunctionCallableNodeHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0507'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0375(): AlwaysRememberedExprHandler
    {
        return new AlwaysRememberedExprHandler(
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0376(): SetOffsetValueTypeExprHandler
    {
        return new SetOffsetValueTypeExprHandler($this->getService('0730'));
    }

    public function createService0377(): IssetExprHandler
    {
        return new IssetExprHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0378(): SetExistingOffsetValueTypeExprHandler
    {
        return new SetExistingOffsetValueTypeExprHandler($this->getService('0730'));
    }

    public function createService0379(): ExistingArrayDimFetchHandler
    {
        return new ExistingArrayDimFetchHandler($this->getService('0730'));
    }

    public function createService0380(): ArrayHandler
    {
        return new ArrayHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0384'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0381(): IdenticalNarrowingHelper
    {
        return new IdenticalNarrowingHelper(
            $this->getService('0395'),
            $this->getService('reflectionProvider'),
            $this->getService('0386'),
            $this->getService('0540'),
            $this->getService('0479')
        );
    }

    public function createService0382(): FuncCallScopeEffectsHelper
    {
        return new FuncCallScopeEffectsHelper($this->getService('0388'), $this->getService('0354'));
    }

    public function createService0383(): ImplicitToStringCallHelper
    {
        return new ImplicitToStringCallHelper(
            $this->getService('0387'),
            $this->getService('0399'),
            $this->getService('0730'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0384(): ClosureTypeResolver
    {
        return new ClosureTypeResolver(
            $this->getService('0483'),
            $this->getService('0507'),
            $this->getService('0396'),
            $this->getService('0472')
        );
    }

    public function createService0385(): ConditionalExpressionHolderHelper
    {
        return new ConditionalExpressionHolderHelper($this->getService('0395'));
    }

    public function createService0386(): CountNarrowingHelper
    {
        return new CountNarrowingHelper($this->getService('0395'), $this->getService('0540'));
    }

    public function createService0387(): MethodThrowPointHelper
    {
        return new MethodThrowPointHelper(
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicMethodThrowTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodThrowTypeExtension'),
            $this->getParameter('exceptions')['implicitThrows']
        );
    }

    public function createService0388(): OutputBufferHelper
    {
        return new OutputBufferHelper($this->getService('0507'));
    }

    public function createService0389(): CoalesceCompositionHelper
    {
        return new CoalesceCompositionHelper($this->getService('0395'));
    }

    public function createService0390(): IncDecTypeHelper
    {
        return new IncDecTypeHelper($this->getService('0507'));
    }

    public function createService0391(): DynamicReturnTypeStoragePrimer
    {
        return new DynamicReturnTypeStoragePrimer;
    }

    public function createService0392(): VirtualExprResultHelper
    {
        return new VirtualExprResultHelper($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0393(): BooleanNarrowingHelper
    {
        return new BooleanNarrowingHelper($this->getService('0385'), $this->getService('0395'));
    }

    public function createService0394(): ClosureParameterResolver
    {
        return new ClosureParameterResolver(
            $this->getService('0483'),
            $this->getService('0384'),
            $this->getService('0396')
        );
    }

    public function createService0395(): DefaultNarrowingHelper
    {
        return new DefaultNarrowingHelper(
            $this->getService('0540'),
            $this->getParameter('rememberPossiblyImpureFunctionValues'),
            $this->getService('reflectionProvider'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0396(): ContextualClosureParameterResolver
    {
        return new ContextualClosureParameterResolver(
            $this->getService('0483'),
            $this->getService('0472')
        );
    }

    public function createService0397(): EarlyTerminatingCallHelper
    {
        return new EarlyTerminatingCallHelper(
            $this->getService('reflectionProvider'),
            $this->getParameter('earlyTerminatingMethodCalls'),
            $this->getParameter('earlyTerminatingFunctionCalls')
        );
    }

    public function createService0398(): NonNullabilityHelper
    {
        return new NonNullabilityHelper($this->getService('0540'));
    }

    public function createService0399(): MethodCallReturnTypeHelper
    {
        return new MethodCallReturnTypeHelper($this->getService('0335'), $this->getService('0391'));
    }

    public function createService0400(): ForeachEmptyOrObjectNarrowingHelper
    {
        return new ForeachEmptyOrObjectNarrowingHelper(
            $this->getService('reflectionProvider'),
            $this->getService('0381'),
            $this->getService('0395'),
            $this->getService('0393')
        );
    }

    public function createService0401(): ClassConstFetchHandler
    {
        return new ClassConstFetchHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0402(): NullsafeMethodCallHandler
    {
        return new NullsafeMethodCallHandler(
            $this->getService('0398'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0393')
        );
    }

    public function createService0403(): ErrorSuppressHandler
    {
        return new ErrorSuppressHandler($this->getService('0730'));
    }

    public function createService0404(): ScalarHandler
    {
        return new ScalarHandler($this->getService('0507'), $this->getService('0730'));
    }

    public function createService0405(): ArrowFunctionHandler
    {
        return new ArrowFunctionHandler(
            $this->getService('0384'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0471'),
            $this->getService('0472')
        );
    }

    public function createService0406(): VariableHandler
    {
        return new VariableHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0381'),
            $this->getService('0507')
        );
    }

    public function createService0407(): BooleanAndHandler
    {
        return new BooleanAndHandler($this->getService('0393'), $this->getService('0730'));
    }

    public function createService0408(): StaticCallHandler
    {
        return new StaticCallHandler(
            $this->getService('0399'),
            $this->getService('0387'),
            $this->getService('reflectionProvider'),
            $this->getParameter('rememberPossiblyImpureFunctionValues'),
            $this->getService('0730'),
            $this->getService('typeSpecifier'),
            $this->getService('0395'),
            $this->getService('0391'),
            $this->getService('0397'),
            $this->getService('0488')
        );
    }

    public function createService0409(): PreDecHandler
    {
        return new PreDecHandler(
            $this->getService('0730'),
            $this->getService('0390'),
            $this->getService('0395'),
            $this->getService('0354')
        );
    }

    public function createService0410(): BooleanOrHandler
    {
        return new BooleanOrHandler($this->getService('0393'), $this->getService('0730'));
    }

    public function createService0411(): CastHandler
    {
        return new CastHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0381')
        );
    }

    public function createService0412(): CloneHandler
    {
        return new CloneHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0413(): InterpolatedStringHandler
    {
        return new InterpolatedStringHandler(
            $this->getService('0507'),
            $this->getService('0383'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0414(): BinaryOpHandler
    {
        return new BinaryOpHandler(
            $this->getService('0507'),
            $this->getService('0479'),
            $this->getService('09'),
            $this->getService('0383'),
            $this->getService('0540'),
            $this->getService('0381'),
            $this->getService('0386'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0415(): EvalHandler
    {
        return new EvalHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0416(): PostIncHandler
    {
        return new PostIncHandler(
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0390'),
            $this->getService('0354')
        );
    }

    public function createService0417(): UnaryPlusHandler
    {
        return new UnaryPlusHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0418(): ConstFetchHandler
    {
        return new ConstFetchHandler(
            $this->getService('0431'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0419(): StaticPropertyFetchHandler
    {
        return new StaticPropertyFetchHandler(
            $this->getService('096'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0420(): MethodCallHandler
    {
        return new MethodCallHandler(
            $this->getService('0469'),
            $this->getService('0399'),
            $this->getService('0387'),
            $this->getService('reflectionProvider'),
            $this->getParameter('rememberPossiblyImpureFunctionValues'),
            $this->getService('0730'),
            $this->getService('typeSpecifier'),
            $this->getService('0395'),
            $this->getService('0391'),
            $this->getService('0397'),
            $this->getService('0488')
        );
    }

    public function createService0421(): NewHandler
    {
        return new NewHandler(
            $this->getService('reflectionProvider'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicStaticMethodThrowTypeExtension'),
            $this->getService('0335'),
            $this->getService('096'),
            $this->getParameter('exceptions')['implicitThrows'],
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0391'),
            $this->getService('012'),
            $this->getService('0488')
        );
    }

    public function createService0422(): BitwiseNotHandler
    {
        return new BitwiseNotHandler(
            $this->getService('0507'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0423(): PropertyFetchHandler
    {
        return new PropertyFetchHandler(
            $this->getService('096'),
            $this->getService('0730'),
            $this->getService('0478'),
            $this->getService('0395'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0424(): YieldHandler
    {
        return new YieldHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0425(): FuncCallHandler
    {
        return new FuncCallHandler(
            $this->getService('reflectionProvider'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.DynamicFunctionThrowTypeExtension'),
            $this->getService('0335'),
            $this->getParameter('exceptions')['implicitThrows'],
            $this->getParameter('rememberPossiblyImpureFunctionValues'),
            $this->getService('0382'),
            $this->getService('0730'),
            $this->getService('typeSpecifier'),
            $this->getService('0395'),
            $this->getService('0397'),
            $this->getService('0391'),
            $this->getService('027'),
            $this->getService('0384'),
            $this->getService('0488'),
            $this->getService('0471'),
            $this->getService('0354'),
            $this->getService('0472')
        );
    }

    public function createService0426(): ThrowHandler
    {
        return new ThrowHandler($this->getService('0730'), $this->getService('0395'));
    }

    public function createService0427(): IssetHandler
    {
        return new IssetHandler(
            $this->getService('0398'),
            $this->getService('0730'),
            $this->getService('0387'),
            $this->getService('0395'),
            $this->getService('0393')
        );
    }

    public function createService0428(): PrintHandler
    {
        return new PrintHandler(
            $this->getService('0383'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0429(): CastStringHandler
    {
        return new CastStringHandler(
            $this->getService('0507'),
            $this->getService('0383'),
            $this->getService('0730'),
            $this->getService('0395')
        );
    }

    public function createService0430(): AssignOpHandler
    {
        return new AssignOpHandler(
            $this->getService('0354'),
            $this->getService('0507'),
            $this->getService('0383'),
            $this->getService('0730'),
            $this->getService('0395'),
            $this->getService('0389')
        );
    }

    public function createService0431(): ConstantResolver
    {
        return $this->getService('0484')->create();
    }

    public function createService0432(): VarAnnotationProcessor
    {
        return new VarAnnotationProcessor($this->getService('0117'));
    }

    public function createService0433(): WhileHandler
    {
        return new WhileHandler(
            $this->getParameter('polluteScopeWithLoopInitialAssignments'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0434(): ExpressionHandler
    {
        return new ExpressionHandler(
            $this->getService('0477'),
            $this->getParameter('rememberPossiblyImpureFunctionValues')
        );
    }

    public function createService0435(): TraitUseHandler
    {
        return new TraitUseHandler(
            $this->getService('reflectionProvider'),
            $this->getService('0343'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('0485'),
            $this->getService('0117')
        );
    }

    public function createService0436(): UnsetHandler
    {
        return new UnsetHandler($this->getService('012'), $this->getService('0354'));
    }

    public function createService0437(): UseHandler
    {
        return new UseHandler;
    }

    public function createService0438(): BlockHandler
    {
        return new BlockHandler($this->getParameter('polluteScopeWithBlock'));
    }

    public function createService0439(): GotoHandler
    {
        return new GotoHandler;
    }

    public function createService0440(): FunctionHandler
    {
        return new FunctionHandler(
            $this->getService('0480'),
            $this->getService('0486'),
            $this->getService('0485'),
            $this->getService('0482')
        );
    }

    public function createService0441(): TryCatchHandler
    {
        return new TryCatchHandler($this->getService('0477'));
    }

    public function createService0442(): NopHandler
    {
        return new NopHandler;
    }

    public function createService0443(): ClassMethodHandler
    {
        return new ClassMethodHandler(
            $this->getService('0480'),
            $this->getService('0486'),
            $this->getService('0465'),
            $this->getService('0485'),
            $this->getService('0482')
        );
    }

    public function createService0444(): EnumCaseHandler
    {
        return new EnumCaseHandler($this->getService('0485'));
    }

    public function createService0445(): ConstHandler
    {
        return new ConstHandler;
    }

    public function createService0446(): ForHandler
    {
        return new ForHandler(
            $this->getParameter('polluteScopeWithLoopInitialAssignments'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0447(): GlobalHandler
    {
        return new GlobalHandler($this->getService('0432'));
    }

    public function createService0448(): SwitchHandler
    {
        return new SwitchHandler($this->getService('012'));
    }

    public function createService0449(): DeclareHandler
    {
        return new DeclareHandler;
    }

    public function createService0450(): GroupUseHandler
    {
        return new GroupUseHandler;
    }

    public function createService0451(): PropertyHandler
    {
        return new PropertyHandler(
            $this->getService('0486'),
            $this->getService('0465'),
            $this->getService('0485')
        );
    }

    public function createService0452(): EchoHandler
    {
        return new EchoHandler($this->getService('0383'));
    }

    public function createService0453(): StaticVariableHandler
    {
        return new StaticVariableHandler($this->getService('0432'), $this->getService('0475'));
    }

    public function createService0454(): TraitHandler
    {
        return new TraitHandler($this->getService('reflectionProvider'));
    }

    public function createService0455(): NamespaceHandler
    {
        return new NamespaceHandler;
    }

    public function createService0456(): ReturnHandler
    {
        return new ReturnHandler($this->getService('0477'));
    }

    public function createService0457(): BreakContinueHandler
    {
        return new BreakContinueHandler;
    }

    public function createService0458(): DoWhileHandler
    {
        return new DoWhileHandler($this->getParameter('treatPhpDocTypesAsCertain'));
    }

    public function createService0459(): LabelHandler
    {
        return new LabelHandler;
    }

    public function createService0460(): ClassConstHandler
    {
        return new ClassConstHandler($this->getService('0485'));
    }

    public function createService0461(): InlineHtmlHandler
    {
        return new InlineHtmlHandler;
    }

    public function createService0462(): ClassLikeHandler
    {
        return new ClassLikeHandler(
            $this->getService('betterReflectionReflector'),
            $this->getService('0733'),
            $this->getService('0469'),
            $this->getService('reflectionProvider'),
            $this->getService('0485'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.Properties.ReadWritePropertiesExtension')
        );
    }

    public function createService0463(): IfHandler
    {
        return new IfHandler($this->getParameter('treatPhpDocTypesAsCertain'));
    }

    public function createService0464(): ForeachHandler
    {
        return new ForeachHandler(
            $this->getService('012'),
            $this->getParameter('exceptions')['implicitThrows'],
            $this->getService('0432'),
            $this->getService('0354'),
            $this->getParameter('polluteScopeWithAlwaysIterableForeach')
        );
    }

    public function createService0465(): PropertyHooksProcessor
    {
        return new PropertyHooksProcessor(
            $this->getService('0480'),
            $this->getService('0486'),
            $this->getService('0485'),
            $this->getService('0482')
        );
    }

    public function createService0466(): RuleErrorTransformer
    {
        return new RuleErrorTransformer(
            $this->getService('currentPhpVersionPhpParser'),
            $this->getService('defaultAnalysisParser'),
            $this->getParameter('fixer')['importNames'],
            $this->getParameter('fixer')['preferSelf']
        );
    }

    public function createService0467(): ScopeFactory
    {
        return new ScopeFactory($this->getService('0731'));
    }

    public function createService0468(): LocalIgnoresProcessor
    {
        return new LocalIgnoresProcessor;
    }

    public function createService0469(): CalledMethodProcessor
    {
        return new CalledMethodProcessor(
            $this->getService('0343'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('0467')
        );
    }

    public function createService0470(): FileAnalyser
    {
        return new FileAnalyser(
            $this->getService('0467'),
            $this->getService('0483'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Analyser.IgnoreErrorExtension'),
            $this->getService('0466'),
            $this->getService('0468'),
            $this->getParameter('reportIgnoresWithoutComments'),
            $this->getService('0487'),
            $this->getService('0581')
        );
    }

    public function createService0471(): ClosureProcessor
    {
        return new ClosureProcessor(
            $this->getService('012'),
            $this->getService('0730'),
            $this->getService('0394'),
            $this->getService('0384'),
            $this->getService('0396'),
            $this->getService('0472')
        );
    }

    public function createService0472(): ClosureSignatureInference
    {
        return new ClosureSignatureInference($this->getParameter('featureToggles')['closureSignaturesFromUsages']);
    }

    public function createService0473(): TemplateArgumentObserver
    {
        return new TemplateArgumentObserver;
    }

    public function createService0474(): TemplateArgumentResolver
    {
        return new TemplateArgumentResolver;
    }

    public function createService0475(): StaticVariableInference
    {
        return new StaticVariableInference(
            $this->getService('reflectionProvider'),
            $this->getParameter('featureToggles')['staticVariablesFromUsages']
        );
    }

    public function createService0476(): DeclarationDependencyTracker
    {
        return new ValueDependencyDeclarationDependencyTracker($this->getService('0487'));
    }

    public function createService0477(): StatementsHandler
    {
        return new StatementsHandler(
            $this->getService('0117'),
            $this->getService('0473'),
            $this->getService('0474'),
            $this->getService('012'),
            $this->getService('0475'),
            $this->getParameter('featureToggles')['unresolvedTemplateArguments']
        );
    }

    public function createService0478(): PropertyHookThrowPointsResolver
    {
        return new PropertyHookThrowPointsResolver($this->getParameter('exceptions')['implicitThrows']);
    }

    public function createService0479(): RicherScopeGetTypeHelper
    {
        return new RicherScopeGetTypeHelper($this->getService('0507'), $this->getService('096'));
    }

    public function createService0480(): DeprecatedAttributeResolver
    {
        return new DeprecatedAttributeResolver($this->getService('0507'));
    }

    public function createService0481(): AnalyserResultFinalizer
    {
        return new AnalyserResultFinalizer(
            $this->getService('registry'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Analyser.IgnoreErrorExtension'),
            $this->getService('0466'),
            $this->getService('0467'),
            $this->getService('0468'),
            $this->getService('0493'),
            $this->getService('0490'),
            $this->getParameter('reportUnmatchedIgnoredErrors'),
            $this->getService('0487'),
            $this->getParameter('featureToggles')['reuseCollectedDataRuleErrors']
        );
    }

    public function createService0482(): ParametersProcessor
    {
        return new ParametersProcessor($this->getService('0485'));
    }

    public function createService0483(): NodeScopeResolver
    {
        return new NodeScopeResolver(
            $this->getService('012'),
            $this->getService('0473'),
            $this->getService('0343'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Analyser.PerFileAnalysisResettable'),
            $this->getService('0730'),
            $this->getService('0477')
        );
    }

    public function createService0484(): ConstantResolverFactory
    {
        return new ConstantResolverFactory($this->getService('0516'), $this->getService('012'));
    }

    public function createService0485(): AttributesHandler
    {
        return new AttributesHandler($this->getService('reflectionProvider'), $this->getService('0488'));
    }

    public function createService0486(): PhpDocsResolver
    {
        return new PhpDocsResolver($this->getService('0117'), $this->getService('0550'));
    }

    public function createService0487(): ValueDependencyCollector
    {
        return new ValueDependencyCollector(
            $this->getService('phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheValueExtension'),
            $this->getService('0343')
        );
    }

    public function createService0488(): ArgumentsHandler
    {
        return new ArgumentsHandler(
            $this->getService('0473'),
            $this->getService('0730'),
            $this->getService('0471'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.FunctionParameterOutTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.MethodParameterOutTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterOutTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureThisExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureThisExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureThisExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.FunctionParameterClosureTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.MethodParameterClosureTypeExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Type.StaticMethodParameterClosureTypeExtension'),
            $this->getParameter('exceptions')['implicitThrows'],
            $this->getService('0354'),
            $this->getService('0384'),
            $this->getService('0394')
        );
    }

    public function createService0489(): IgnoreLexer
    {
        return new IgnoreLexer;
    }

    public function createService0490(): LineIgnoreFixer
    {
        return new LineIgnoreFixer($this->getService('0493'));
    }

    public function createService0491(): IgnoredErrorHelper
    {
        return new IgnoredErrorHelper(
            $this->getService('0343'),
            $this->getService('0492'),
            $this->getService('fileExcluderAnalyse'),
            $this->getParameter('ignoreErrors'),
            $this->getParameter('reportUnmatchedIgnoredErrors'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('analysedPathsFromConfig')
        );
    }

    public function createService0492(): IgnoreErrorsConfigFixer
    {
        return new IgnoreErrorsConfigFixer(
            $this->getService('currentPhpVersionPhpParser'),
            $this->getService('0582'),
            $this->getService('0103'),
            $this->getService('0343'),
            $this->getParameter('allConfigFiles'),
            $this->getParameter('rootDir'),
            $this->getParameter('currentWorkingDirectory')
        );
    }

    public function createService0493(): UnmatchedIgnoreFixer
    {
        return new UnmatchedIgnoreFixer($this->getService('0489'), $this->getService('0115'));
    }

    public function createService0494(): FunctionResultCacheValueExtension
    {
        return new FunctionResultCacheValueExtension($this->getService('reflectionProvider'));
    }

    public function createService0495(): ResultCacheClearer
    {
        return new ResultCacheClearer($this->getParameter('resultCachePath'));
    }

    public function createService0496(): FileResultCacheValueExtension
    {
        return new FileResultCacheValueExtension($this->getService('0346'), $this->getParameter('rootDir'));
    }

    public function createService0497(): ConstantResultCacheValueExtension
    {
        return new ConstantResultCacheValueExtension($this->getService('reflectionProvider'));
    }

    public function createService0498(): ClassResultCacheValueExtension
    {
        return new ClassResultCacheValueExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0585'),
            $this->getService('0346')
        );
    }

    public function createService0499(): DirectoryResultCacheValueExtension
    {
        return new DirectoryResultCacheValueExtension(
            $this->getService('0346'),
            $this->getParameter('rootDir')
        );
    }

    public function createService0500(): Analyser
    {
        return new Analyser(
            $this->getService('0470'),
            $this->getService('registry'),
            $this->getService('0101'),
            $this->getService('0483'),
            $this->getParameter('internalErrorsCountLimit')
        );
    }

    public function createService0501(): Php8SignatureMapProvider
    {
        return new Php8SignatureMapProvider(
            $this->getService('0506'),
            $this->getService('0526'),
            $this->getService('0117'),
            $this->getService('09'),
            $this->getService('0507'),
            $this->getService('0516')
        );
    }

    public function createService0502(): SignatureMapProvider
    {
        return $this->getService('0504')->create();
    }

    public function createService0503(): NativeFunctionReflectionProvider
    {
        return new NativeFunctionReflectionProvider(
            $this->getService('0502'),
            $this->getService('betterReflectionReflector'),
            $this->getService('0117'),
            $this->getService('stubPhpDocProvider'),
            $this->getService('0514'),
            $this->getService('0521')
        );
    }

    public function createService0504(): SignatureMapProviderFactory
    {
        return new SignatureMapProviderFactory(
            $this->getService('09'),
            $this->getService('0506'),
            $this->getService('0501')
        );
    }

    public function createService0505(): SignatureMapParser
    {
        return new SignatureMapParser($this->getService('0553'));
    }

    public function createService0506(): FunctionSignatureMapProvider
    {
        return new FunctionSignatureMapProvider(
            $this->getService('0505'),
            $this->getService('0507'),
            $this->getService('09'),
            $this->getParameter('featureToggles')['stricterFunctionMap']
        );
    }

    public function createService0507(): InitializerExprTypeResolver
    {
        return new InitializerExprTypeResolver(
            $this->getService('0431'),
            $this->getService('0516'),
            $this->getService('09'),
            $this->getService('0337'),
            $this->getService('0340'),
            $this->getService('0120'),
            $this->getParameter('usePathConstantsAsConstantString'),
            $this->getService('0487')
        );
    }

    public function createService0508(): PhpClassReflectionExtension
    {
        return new PhpClassReflectionExtension(
            $this->getService('0467'),
            $this->getService('0486'),
            $this->getService('0483'),
            $this->getService('0735'),
            $this->getService('0550'),
            $this->getService('0513'),
            $this->getService('0517'),
            $this->getService('0518'),
            $this->getService('0502'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('stubPhpDocProvider'),
            $this->getService('0516'),
            $this->getService('0117'),
            $this->getService('0514'),
            $this->getService('0521'),
            $this->getParameter('inferPrivatePropertyTypeFromConstructor'),
            $this->getService('09'),
            $this->getParameter('featureToggles')['backedEnumFromParameterType'],
            $this->getParameter('cache')['memberCacheKeysMax']
        );
    }

    public function createService0509(): UniversalObjectCratesClassReflectionExtension
    {
        return new UniversalObjectCratesClassReflectionExtension(
            $this->getService('reflectionProvider'),
            $this->getParameter('universalObjectCratesClasses'),
            $this->getService('0518')
        );
    }

    public function createService0510(): SoapClientMethodsClassReflectionExtension
    {
        return new SoapClientMethodsClassReflectionExtension;
    }

    public function createService0511(): SealedAllowedSubTypesClassReflectionExtension
    {
        return new SealedAllowedSubTypesClassReflectionExtension;
    }

    public function createService0512(): EnumAllowedSubTypesClassReflectionExtension
    {
        return new EnumAllowedSubTypesClassReflectionExtension;
    }

    public function createService0513(): DeprecationProvider
    {
        return new DeprecationProvider(
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ClassConstantDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.ConstantDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.EnumCaseDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.FunctionDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.MethodDeprecationExtension'),
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.Deprecation.PropertyDeprecationExtension')
        );
    }

    public function createService0514(): AttributeReflectionFactory
    {
        return new AttributeReflectionFactory($this->getService('0507'), $this->getService('0516'));
    }

    public function createService0515(): ConstructorsHelper
    {
        return new ConstructorsHelper(
            $this->getService('phpstan.extensionsCollection.PHPStan.Reflection.AdditionalConstructorsExtension'),
            $this->getParameter('additionalConstructors')
        );
    }

    public function createService0516(): ReflectionProviderProvider
    {
        return new LazyReflectionProviderProvider($this->getService('012'));
    }

    public function createService0517(): AnnotationsMethodsClassReflectionExtension
    {
        return new AnnotationsMethodsClassReflectionExtension;
    }

    public function createService0518(): AnnotationsPropertiesClassReflectionExtension
    {
        return new AnnotationsPropertiesClassReflectionExtension;
    }

    public function createService0519(): MixinMethodsClassReflectionExtension
    {
        return new MixinMethodsClassReflectionExtension($this->getParameter('mixinExcludeClasses'));
    }

    public function createService0520(): MixinPropertiesClassReflectionExtension
    {
        return new MixinPropertiesClassReflectionExtension($this->getParameter('mixinExcludeClasses'));
    }

    public function createService0521(): ParameterAllowedConstantsMapProvider
    {
        return new ParameterAllowedConstantsMapProvider;
    }

    public function createService0522(): ExtensionVersionProvider
    {
        return new ExtensionVersionProvider($this->getParameter('composerAutoloaderProjectPaths'));
    }

    public function createService0523(): ReflectionSourceStubberFactory
    {
        return new ReflectionSourceStubberFactory(
            $this->getService('0539'),
            $this->getService('09')
        );
    }

    public function createService0524(): PhpStormStubsSourceStubberFactory
    {
        return new PhpStormStubsSourceStubberFactory(
            $this->getService('php8PhpParser'),
            $this->getService('0539'),
            $this->getService('09'),
            $this->getParameter('cache')['phpStormStubsNodesCountMax'],
            $this->getService('0522')
        );
    }

    public function createService0525(): PreForkDirectorySymbolScanner
    {
        return new PreForkDirectorySymbolScanner(
            $this->getService('0531'),
            $this->getService('0527'),
            $this->getService('0533'),
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('analysedPathsFromConfig'),
            $this->getParameter('scanDirectories')
        );
    }

    public function createService0526(): FileNodesFetcher
    {
        return new FileNodesFetcher(
            $this->getService('0532'),
            $this->getService('defaultAnalysisParser'),
            $this->getService('0347')
        );
    }

    public function createService0527(): OptimizedDirectorySourceLocatorRepository
    {
        return new OptimizedDirectorySourceLocatorRepository($this->getService('0533'));
    }

    public function createService0528(): BootstrapAutoloaderExceptionReporter
    {
        return new BootstrapAutoloaderExceptionReporter;
    }

    public function createService0529(): PhpFileCleaner
    {
        return new PhpFileCleaner;
    }

    public function createService0530(): OptimizedSingleFileSourceLocatorRepository
    {
        return new OptimizedSingleFileSourceLocatorRepository($this->getService('0736'));
    }

    public function createService0531(): ComposerJsonAndInstalledJsonSourceLocatorMaker
    {
        return new ComposerJsonAndInstalledJsonSourceLocatorMaker(
            $this->getService('0527'),
            $this->getService('0737'),
            $this->getService('0533'),
            $this->getService('09')
        );
    }

    public function createService0532(): CachingVisitor
    {
        return new CachingVisitor;
    }

    public function createService0533(): OptimizedDirectorySourceLocatorFactory
    {
        return new OptimizedDirectorySourceLocatorFactory(
            $this->getService('0526'),
            $this->getService('fileFinderScan'),
            $this->getService('09'),
            $this->getService('0534'),
            $this->getService('015'),
            $this->getService('0346'),
            $this->getService('0348'),
            $this->getParameter('tmpDir')
        );
    }

    public function createService0534(): SymbolFinderInFiles
    {
        return new SymbolFinderInFiles($this->getService('0529'));
    }

    public function createService0535(): BetterReflectionSourceLocatorFactory
    {
        return new BetterReflectionSourceLocatorFactory(
            $this->getService('phpParserDecorator'),
            $this->getService('php8PhpParser'),
            $this->getService('015'),
            $this->getService('0343'),
            $this->getService('09'),
            $this->getService('01078'),
            $this->getService('0522'),
            $this->getService('01079'),
            $this->getService('0530'),
            $this->getService('0527'),
            $this->getService('0533'),
            $this->getService('0531'),
            $this->getService('0737'),
            $this->getService('0526'),
            $this->getService('0528'),
            $this->getParameter('scanFiles'),
            $this->getParameter('scanDirectories'),
            $this->getParameter('analysedPaths'),
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getParameter('analysedPathsFromConfig'),
            $this->getParameter('sourceLocatorPlaygroundMode'),
            $this->getParameter('singleReflectionFile')
        );
    }

    public function createService0536(): AdapterReflectionEnumDynamicReturnTypeExtension
    {
        return new AdapterReflectionEnumDynamicReturnTypeExtension;
    }

    public function createService0537(): RequireExtendsMethodsClassReflectionExtension
    {
        return new RequireExtendsMethodsClassReflectionExtension;
    }

    public function createService0538(): RequireExtendsPropertiesClassReflectionExtension
    {
        return new RequireExtendsPropertiesClassReflectionExtension;
    }

    public function createService0539(): PHPStan\Node\Printer\Printer
    {
        return new PHPStan\Node\Printer\Printer;
    }

    public function createService0540(): ExprPrinter
    {
        return new ExprPrinter($this->getService('0539'));
    }

    public function createService0541(): ConstExprNodeResolver
    {
        return new ConstExprNodeResolver($this->getService('0516'), $this->getService('0507'));
    }

    public function createService0542(): BcMathNumberStubFilesExtension
    {
        return new BcMathNumberStubFilesExtension($this->getService('09'));
    }

    public function createService0543(): StubFilesProvider
    {
        return new DefaultStubFilesProvider(
            $this->getService('phpstan.extensionsCollection.PHPStan.PhpDoc.StubFilesExtension'),
            $this->getService('0343'),
            $this->getParameter('stubFiles'),
            $this->getParameter('composerAutoloaderProjectPaths')
        );
    }

    public function createService0544(): TypeNodeResolver
    {
        return new TypeNodeResolver(
            $this->getService('0551'),
            $this->getService('0516'),
            $this->getService('0338'),
            $this->getService('0431'),
            $this->getService('0507'),
            $this->getParameter('reportUnsafeArrayStringKeyCasting'),
            $this->getService('0487')
        );
    }

    public function createService0545(): ExtDsStubFilesExtension
    {
        return new ExtDsStubFilesExtension($this->getService('0522'));
    }

    public function createService0546(): PhpDocNodeResolver
    {
        return new PhpDocNodeResolver($this->getService('0544'), $this->getService('0541'), $this->getService('083'));
    }

    public function createService0547(): PhpDocStringResolver
    {
        return new PhpDocStringResolver($this->getService('01073'), $this->getService('01076'));
    }

    public function createService0548(): ReflectionEnumStubFilesExtension
    {
        return new ReflectionEnumStubFilesExtension($this->getService('09'));
    }

    public function createService0549(): StubValidator
    {
        return new StubValidator($this->getService('011'), $this->getService('012'), $this->getService('0543'));
    }

    public function createService0550(): PhpDocInheritanceResolver
    {
        return new PhpDocInheritanceResolver($this->getService('0117'));
    }

    public function createService0551(): TypeNodeResolverExtensionRegistryProvider
    {
        return new LazyTypeNodeResolverExtensionRegistryProvider($this->getService('012'));
    }

    public function createService0552(): JsonValidateStubFilesExtension
    {
        return new JsonValidateStubFilesExtension($this->getService('09'));
    }

    public function createService0553(): TypeStringResolver
    {
        return new TypeStringResolver($this->getService('01073'), $this->getService('01074'), $this->getService('0544'));
    }

    public function createService0554(): SocketSelectStubFilesExtension
    {
        return new SocketSelectStubFilesExtension($this->getService('09'));
    }

    public function createService0555(): ReflectionClassStubFilesExtension
    {
        return new ReflectionClassStubFilesExtension($this->getService('09'));
    }

    public function createService0556(): ImplodeArgVisitor
    {
        return new ImplodeArgVisitor;
    }

    public function createService0557(): MagicConstantParamDefaultVisitor
    {
        return new MagicConstantParamDefaultVisitor;
    }

    public function createService0558(): ArrayWalkArgVisitor
    {
        return new ArrayWalkArgVisitor;
    }

    public function createService0559(): ArrayMapArgVisitor
    {
        return new ArrayMapArgVisitor;
    }

    public function createService0560(): DeclarePositionVisitor
    {
        return new DeclarePositionVisitor;
    }

    public function createService0561(): ArrayFindArgVisitor
    {
        return new ArrayFindArgVisitor;
    }

    public function createService0562(): StandaloneThrowExprVisitor
    {
        return new StandaloneThrowExprVisitor;
    }

    public function createService0563(): NewAssignedToPropertyVisitor
    {
        return new NewAssignedToPropertyVisitor;
    }

    public function createService0564(): ArrayOffsetNormalizingVisitor
    {
        return new ArrayOffsetNormalizingVisitor;
    }

    public function createService0565(): ArrayFilterArgVisitor
    {
        return new ArrayFilterArgVisitor;
    }

    public function createService0566(): LexerFactory
    {
        return new LexerFactory($this->getService('09'));
    }

    public function createService0567(): TryCatchTypeVisitor
    {
        return new TryCatchTypeVisitor;
    }

    public function createService0568(): ClosureBindToVarVisitor
    {
        return new ClosureBindToVarVisitor;
    }

    public function createService0569(): ClosureArgVisitor
    {
        return new ClosureArgVisitor;
    }

    public function createService0570(): ImmediatelyInvokedClosureVisitor
    {
        return new ImmediatelyInvokedClosureVisitor;
    }

    public function createService0571(): LastConditionVisitor
    {
        return new LastConditionVisitor;
    }

    public function createService0572(): CurlSetOptArgVisitor
    {
        return new CurlSetOptArgVisitor;
    }

    public function createService0573(): UseAliasVisitor
    {
        return new UseAliasVisitor;
    }

    public function createService0574(): ClosureBindArgVisitor
    {
        return new ClosureBindArgVisitor;
    }

    public function createService0575(): ParentStmtTypesVisitor
    {
        return new ParentStmtTypesVisitor;
    }

    public function createService0576(): ArrowFunctionArgVisitor
    {
        return new ArrowFunctionArgVisitor;
    }

    public function createService0577(): CurlSetOptArrayArgVisitor
    {
        return new CurlSetOptArrayArgVisitor;
    }

    public function createService0578(): GotoLabelVisitor
    {
        return new GotoLabelVisitor;
    }

    public function createService0579(): AnonymousClassVisitor
    {
        return new AnonymousClassVisitor;
    }

    public function createService0580(): TypeTraverserInstanceofVisitor
    {
        return new TypeTraverserInstanceofVisitor;
    }

    public function createService0581(): DependencyResolver
    {
        return new DependencyResolver(
            $this->getService('0343'),
            $this->getService('reflectionProvider'),
            $this->getService('0583'),
            $this->getService('0582')
        );
    }

    public function createService0582(): PackageDependencyResolver
    {
        return new PackageDependencyResolver(
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getService('0343')
        );
    }

    public function createService0583(): ExportedNodeResolver
    {
        return new ExportedNodeResolver($this->getService('reflectionProvider'), $this->getService('0540'));
    }

    public function createService0584(): ExportedNodeVisitor
    {
        return new ExportedNodeVisitor($this->getService('0583'));
    }

    public function createService0585(): ExportedNodeFetcher
    {
        return new ExportedNodeFetcher($this->getService('defaultAnalysisParser'), $this->getService('0584'));
    }

    public function createService0586(): CpuCoreCounter
    {
        return new CpuCoreCounter($this->getParameter('parallel')['loadLimit']);
    }

    public function createService0587(): RestartDiagnoseExtension
    {
        return new RestartDiagnoseExtension;
    }

    public function createService0588(): AnonymousClassNameHelper
    {
        return new AnonymousClassNameHelper($this->getService('0343'), $this->getService('simpleRelativePathHelper'));
    }

    public function createService0589(): RelationshipQueryCallbackExtension
    {
        return new RelationshipQueryCallbackExtension($this->getService('0607'));
    }

    public function createService0590(): UsedEmailAlternativeSyntaxViewCollector
    {
        return new UsedEmailAlternativeSyntaxViewCollector($this->getService('0686'));
    }

    public function createService0591(): UsedEmailSendViewCollector
    {
        return new UsedEmailSendViewCollector($this->getService('0686'));
    }

    public function createService0592(): UsedEmailViewCollector
    {
        return new UsedEmailViewCollector($this->getService('0686'));
    }

    public function createService0593(): UsedRouteFacadeViewCollector
    {
        return new UsedRouteFacadeViewCollector($this->getService('0686'));
    }

    public function createService0594(): UsedTranslationFacadeCollector
    {
        return new UsedTranslationFacadeCollector($this->getService('0686'));
    }

    public function createService0595(): UsedTranslationFunctionCollector
    {
        return new UsedTranslationFunctionCollector($this->getService('0686'));
    }

    public function createService0596(): UsedTranslationTranslatorCollector
    {
        return new UsedTranslationTranslatorCollector($this->getService('0686'));
    }

    public function createService0597(): UsedTranslationViewCollector
    {
        return new UsedTranslationViewCollector($this->getService('0691'), $this->getService('0690'));
    }

    public function createService0598(): UsedViewFacadeMakeCollector
    {
        return new UsedViewFacadeMakeCollector($this->getService('0686'));
    }

    public function createService0599(): UsedViewFunctionCollector
    {
        return new UsedViewFunctionCollector(
            $this->getService('reflectionProvider'),
            $this->getService('0686')
        );
    }

    public function createService0600(): UsedViewInAnotherViewCollector
    {
        return new UsedViewInAnotherViewCollector($this->getService('0691'), $this->getService('0690'));
    }

    public function createService0601(): UsedViewMakeCollector
    {
        return new UsedViewMakeCollector($this->getService('0686'));
    }

    public function createService0602(): ConfigHelper
    {
        return new ConfigHelper($this->getService('0688'));
    }

    public function createService0603(): ConsoleApplicationHelper
    {
        return new ConsoleApplicationHelper($this->getService('0604'));
    }

    public function createService0604(): ConsoleApplicationResolver
    {
        return new ConsoleApplicationResolver;
    }

    public function createService0605(): LarastanStubFilesExtension
    {
        return new LarastanStubFilesExtension($this->getParameter('redisDriver'));
    }

    public function createService0606(): AuthsMethodsExtension
    {
        return new AuthsMethodsExtension($this->getService('reflectionProvider'));
    }

    public function createService0607(): BuilderHelper
    {
        return new BuilderHelper(
            $this->getService('reflectionProvider'),
            $this->getParameter('checkModelProperties'),
            $this->getService('0613')
        );
    }

    public function createService0608(): ContractsMethodsExtension
    {
        return new ContractsMethodsExtension($this->getService('reflectionProvider'));
    }

    public function createService0609(): EloquentBuilderForwardsCallsExtension
    {
        return new EloquentBuilderForwardsCallsExtension(
            $this->getService('0607'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0610(): FacadesMethodsExtension
    {
        return new FacadesMethodsExtension($this->getService('reflectionProvider'));
    }

    public function createService0611(): HigherOrderCollectionProxyExtension
    {
        return new HigherOrderCollectionProxyExtension($this->getService('0689'));
    }

    public function createService0612(): HigherOrderTapProxyExtension
    {
        return new HigherOrderTapProxyExtension;
    }

    public function createService0613(): MacroMethodsClassReflectionExtension
    {
        return new MacroMethodsClassReflectionExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0122')
        );
    }

    public function createService0614(): ManagersMethodsExtension
    {
        return new ManagersMethodsExtension($this->getService('reflectionProvider'));
    }

    public function createService0615(): ModelFactoryMethodsClassReflectionExtension
    {
        return new ModelFactoryMethodsClassReflectionExtension($this->getService('reflectionProvider'));
    }

    public function createService0616(): ModelForwardsCallsExtension
    {
        return new ModelForwardsCallsExtension(
            $this->getService('0607'),
            $this->getService('reflectionProvider'),
            $this->getService('0609')
        );
    }

    public function createService0617(): RedirectResponseMethodsClassReflectionExtension
    {
        return new RedirectResponseMethodsClassReflectionExtension;
    }

    public function createService0618(): RelationForwardsCallsExtension
    {
        return new RelationForwardsCallsExtension(
            $this->getService('0607'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0619(): StorageMethodsClassReflectionExtension
    {
        return new StorageMethodsClassReflectionExtension($this->getService('reflectionProvider'));
    }

    public function createService0620(): ViewWithMethodsClassReflectionExtension
    {
        return new ViewWithMethodsClassReflectionExtension;
    }

    public function createService0621(): HigherOrderCollectionProxyPropertyExtension
    {
        return new HigherOrderCollectionProxyPropertyExtension($this->getService('0689'));
    }

    public function createService0622(): MigrationCache
    {
        return new MigrationCache(
            $this->getParameter('tmpDir'),
            $this->getParameter('enableMigrationCache')
        );
    }

    public function createService0623(): MigrationHelper
    {
        return new MigrationHelper(
            $this->getService('migrationsParser'),
            $this->getParameter('databaseMigrationsPath'),
            $this->getService('0343'),
            $this->getParameter('disableMigrationScan'),
            $this->getService('reflectionProvider'),
            $this->getService('0507'),
            $this->getService('sqlParser')
        );
    }

    public function createService0624(): ModelAccessorExtension
    {
        return new ModelAccessorExtension($this->getService('0627'));
    }

    public function createService0625(): ModelCastHelper
    {
        return new ModelCastHelper(
            $this->getService('reflectionProvider'),
            $this->getService('currentPhpVersionSimpleDirectParser'),
            $this->getParameter('parseModelCastsMethod'),
            $this->getService('0467')
        );
    }

    public function createService0626(): ModelPropertyExtension
    {
        return new ModelPropertyExtension($this->getService('0627'));
    }

    public function createService0627(): ModelPropertyHelper
    {
        return new ModelPropertyHelper(
            $this->getService('0553'),
            $this->getService('0623'),
            $this->getService('0630'),
            $this->getService('0625'),
            $this->getService('0622'),
            $this->getService('0476'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0628(): ModelRelationsExtension
    {
        return new ModelRelationsExtension($this->getService('0687'));
    }

    public function createService0629(): MySqlDataTypeToPhpTypeConverter
    {
        return new MySqlDataTypeToPhpTypeConverter;
    }

    public function createService0630(): SquashedMigrationHelper
    {
        return new SquashedMigrationHelper(
            $this->getParameter('squashedMigrationsPath'),
            $this->getService('0343'),
            $this->getService('0629'),
            $this->getService('sqlParser'),
            $this->getParameter('disableSchemaScan')
        );
    }

    public function createService0631(): AppFacadeEnvironmentReturnTypeExtension
    {
        return new AppFacadeEnvironmentReturnTypeExtension;
    }

    public function createService0632(): AppMakeDynamicReturnTypeExtension
    {
        return new AppMakeDynamicReturnTypeExtension($this->getService('0633'));
    }

    public function createService0633(): AppMakeHelper
    {
        return new AppMakeHelper;
    }

    public function createService0634(): ApplicationMakeDynamicReturnTypeExtension
    {
        return new ApplicationMakeDynamicReturnTypeExtension($this->getService('0633'));
    }

    public function createService0635(): ArrGetDynamicStaticMethodReturnTypeExtension
    {
        return new ArrGetDynamicStaticMethodReturnTypeExtension;
    }

    public function createService0636(): AuthExtension
    {
        return new AuthExtension;
    }

    public function createService0637(): AuthManagerExtension
    {
        return new AuthManagerExtension;
    }

    public function createService0638(): CollectionFilterRejectDynamicReturnTypeExtension
    {
        return new CollectionFilterRejectDynamicReturnTypeExtension;
    }

    public function createService0639(): CollectionWhereNotNullDynamicReturnTypeExtension
    {
        return new CollectionWhereNotNullDynamicReturnTypeExtension;
    }

    public function createService0640(): ArgumentDynamicReturnTypeExtension
    {
        return new ArgumentDynamicReturnTypeExtension(
            $this->getService('0604'),
            $this->getService('0603')
        );
    }

    public function createService0641(): HasArgumentDynamicReturnTypeExtension
    {
        return new HasArgumentDynamicReturnTypeExtension($this->getService('0604'));
    }

    public function createService0642(): HasOptionDynamicReturnTypeExtension
    {
        return new HasOptionDynamicReturnTypeExtension($this->getService('0604'));
    }

    public function createService0643(): OptionDynamicReturnTypeExtension
    {
        return new OptionDynamicReturnTypeExtension(
            $this->getService('0604'),
            $this->getService('0603')
        );
    }

    public function createService0644(): ContainerMakeDynamicReturnTypeExtension
    {
        return new ContainerMakeDynamicReturnTypeExtension($this->getService('0633'));
    }

    public function createService0645(): DateExtension
    {
        return new DateExtension;
    }

    public function createService0646(): DoubleUnderscoreHelperReturnTypeExtension
    {
        return new DoubleUnderscoreHelperReturnTypeExtension;
    }

    public function createService0647(): EloquentBuilderExtension
    {
        return new EloquentBuilderExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0687')
        );
    }

    public function createService0648(): EloquentCollectionMapDynamicReturnTypeExtension
    {
        return new EloquentCollectionMapDynamicReturnTypeExtension;
    }

    public function createService0649(): FactoryDynamicMethodReturnTypeExtension
    {
        return new FactoryDynamicMethodReturnTypeExtension;
    }

    public function createService0650(): FormRequestSafeDynamicMethodReturnTypeExtension
    {
        return new FormRequestSafeDynamicMethodReturnTypeExtension;
    }

    public function createService0651(): GuardDynamicStaticMethodReturnTypeExtension
    {
        return new GuardDynamicStaticMethodReturnTypeExtension;
    }

    public function createService0652(): GuardExtension
    {
        return new GuardExtension;
    }

    public function createService0653(): AppExtension
    {
        return new AppExtension($this->getService('0633'));
    }

    public function createService0654(): Larastan\Larastan\ReturnTypes\Helpers\AuthExtension
    {
        return new Larastan\Larastan\ReturnTypes\Helpers\AuthExtension;
    }

    public function createService0655(): CollectExtension
    {
        return new CollectExtension(
            $this->getService('0687'),
            $this->getParameter('featureToggles')['unresolvedTemplateArguments']
        );
    }

    public function createService0656(): LiteralExtension
    {
        return new LiteralExtension;
    }

    public function createService0657(): NowAndTodayExtension
    {
        return new NowAndTodayExtension;
    }

    public function createService0658(): ResponseExtension
    {
        return new ResponseExtension;
    }

    public function createService0659(): StrExtension
    {
        return new StrExtension;
    }

    public function createService0660(): TapExtension
    {
        return new TapExtension;
    }

    public function createService0661(): ValidatorExtension
    {
        return new ValidatorExtension;
    }

    public function createService0662(): ValueExtension
    {
        return new ValueExtension;
    }

    public function createService0663(): Larastan\Larastan\ReturnTypes\HigherOrderTapProxyExtension
    {
        return new Larastan\Larastan\ReturnTypes\HigherOrderTapProxyExtension;
    }

    public function createService0664(): LangGetReturnTypeExtension
    {
        return new LangGetReturnTypeExtension;
    }

    public function createService0665(): ModelDynamicStaticMethodReturnTypeExtension
    {
        return new ModelDynamicStaticMethodReturnTypeExtension(
            $this->getService('0607'),
            $this->getService('0687'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0666(): ModelFactoryDynamicStaticMethodReturnTypeExtension
    {
        return new ModelFactoryDynamicStaticMethodReturnTypeExtension($this->getService('reflectionProvider'));
    }

    public function createService0667(): ModelOnlyDynamicMethodReturnTypeExtension
    {
        return new ModelOnlyDynamicMethodReturnTypeExtension;
    }

    public function createService0668(): ModelSerializationDynamicMethodReturnTypeExtension
    {
        return new ModelSerializationDynamicMethodReturnTypeExtension(
            $this->getService('0627'),
            $this->getService('0625'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0669(): RelationCollectionExtension
    {
        return new RelationCollectionExtension(
            $this->getService('reflectionProvider'),
            $this->getService('0687')
        );
    }

    public function createService0670(): RequestFileExtension
    {
        return new RequestFileExtension;
    }

    public function createService0671(): RequestRouteExtension
    {
        return new RequestRouteExtension;
    }

    public function createService0672(): RequestUserExtension
    {
        return new RequestUserExtension;
    }

    public function createService0673(): StorageDynamicStaticMethodReturnTypeExtension
    {
        return new StorageDynamicStaticMethodReturnTypeExtension;
    }

    public function createService0674(): TestCaseExtension
    {
        return new TestCaseExtension;
    }

    public function createService0675(): TransHelperReturnTypeExtension
    {
        return new TransHelperReturnTypeExtension;
    }

    public function createService0676(): TranslatorGetReturnTypeExtension
    {
        return new TranslatorGetReturnTypeExtension;
    }

    public function createService0677(): ArrKeyExistenceRule
    {
        return new ArrKeyExistenceRule;
    }

    public function createService0678(): UndefinedArgumentOrOptionRule
    {
        return new UndefinedArgumentOrOptionRule($this->getService('0604'));
    }

    public function createService0679(): DeferrableServiceProviderMissingProvidesRule
    {
        return new DeferrableServiceProviderMissingProvidesRule;
    }

    public function createService0680(): ModelRelationDefaultsRule
    {
        return new ModelRelationDefaultsRule($this->getService('0682'), $this->getService('0507'));
    }

    public function createService0681(): ModelRuleHelper
    {
        return new ModelRuleHelper;
    }

    public function createService0682(): RelationExistenceHelper
    {
        return new RelationExistenceHelper($this->getService('0681'));
    }

    public function createService0683(): RelationExistenceRule
    {
        return new RelationExistenceRule($this->getService('0682'), $this->getService('0686'));
    }

    public function createService0684(): NoUselessValueFunctionCallsRule
    {
        return new NoUselessValueFunctionCallsRule($this->getService('0686'));
    }

    public function createService0685(): NoUselessWithFunctionCallsRule
    {
        return new NoUselessWithFunctionCallsRule($this->getService('0686'));
    }

    public function createService0686(): CallArgumentsHelper
    {
        return new CallArgumentsHelper($this->getService('reflectionProvider'));
    }

    public function createService0687(): CollectionHelper
    {
        return new CollectionHelper(
            $this->getService('reflectionProvider'),
            $this->getParameter('pivotTypesInCollections')
        );
    }

    public function createService0688(): ConfigParser
    {
        return new ConfigParser(
            $this->getService('0343'),
            $this->getService('currentPhpVersionRichParser'),
            $this->getService('0117'),
            $this->getService('0467'),
            $this->getService('0483'),
            $this->getParameter('configDirectories'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0689(): HigherOrderCollectionProxyHelper
    {
        return new HigherOrderCollectionProxyHelper($this->getService('reflectionProvider'));
    }

    public function createService0690(): ViewFileHelper
    {
        return new ViewFileHelper($this->getParameter('viewDirectories'), $this->getService('0343'));
    }

    public function createService0691(): ViewParser
    {
        return new ViewParser($this->getService('currentPhpVersionSimpleDirectParser'));
    }

    public function createService0692(): ArrPullParameterOutTypeExtension
    {
        return new ArrPullParameterOutTypeExtension;
    }

    public function createService0693(): BuilderOfTypeNodeResolverExtension
    {
        return new BuilderOfTypeNodeResolverExtension($this->getService('0607'));
    }

    public function createService0694(): CollectionOfTypeNodeResolverExtension
    {
        return new CollectionOfTypeNodeResolverExtension($this->getService('0687'));
    }

    public function createService0695(): GenericEloquentBuilderTypeNodeResolverExtension
    {
        return new GenericEloquentBuilderTypeNodeResolverExtension($this->getService('reflectionProvider'));
    }

    public function createService0696(): GenericEloquentCollectionTypeNodeResolverExtension
    {
        return new GenericEloquentCollectionTypeNodeResolverExtension($this->getService('0544'));
    }

    public function createService0697(): ModelPropertyTypeNodeResolverExtension
    {
        return new ModelPropertyTypeNodeResolverExtension(
            $this->getService('0544'),
            $this->getParameter('checkModelProperties'),
            $this->getService('0627'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0698(): RelationOfTypeNodeResolverExtension
    {
        return new RelationOfTypeNodeResolverExtension;
    }

    public function createService0699(): ViewStringTypeNodeResolverExtension
    {
        return new ViewStringTypeNodeResolverExtension;
    }

    public function createService0700(): MethodThrowTypeCovarianceRule
    {
        return new MethodThrowTypeCovarianceRule(
            $this->getService('044'),
            $this->getParameter('exceptions')['implicitThrows']
        );
    }

    public function createService0701(): MissingCheckedExceptionInFunctionThrowsRule
    {
        return new MissingCheckedExceptionInFunctionThrowsRule($this->getService('065'));
    }

    public function createService0702(): MissingCheckedExceptionInPropertyHookThrowsRule
    {
        return new MissingCheckedExceptionInPropertyHookThrowsRule($this->getService('065'));
    }

    public function createService0703(): MissingCheckedExceptionInMethodThrowsRule
    {
        return new MissingCheckedExceptionInMethodThrowsRule($this->getService('065'));
    }

    public function createService0704(): UninitializedPropertyRule
    {
        return new UninitializedPropertyRule($this->getService('0515'));
    }

    public function createService0705(): ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension
    {
        return new ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension($this->getService('0602'));
    }

    public function createService0706(): ConfigRepositoryDynamicMethodReturnTypeExtension
    {
        return new ConfigRepositoryDynamicMethodReturnTypeExtension($this->getService('0602'));
    }

    public function createService0707(): ConfigFunctionDynamicFunctionReturnTypeExtension
    {
        return new ConfigFunctionDynamicFunctionReturnTypeExtension($this->getService('0602'));
    }

    public function createService0708(): EnvFunctionDynamicFunctionReturnTypeExtension
    {
        return new EnvFunctionDynamicFunctionReturnTypeExtension;
    }

    public function createService0709(): ConfigCollectionRule
    {
        return new ConfigCollectionRule($this->getService('0602'), $this->getService('0686'));
    }

    public function createService0710(): ModelAppendsRule
    {
        return new ModelAppendsRule($this->getService('0627'));
    }

    public function createService0711(): NoAuthFacadeInRequestScopeRule
    {
        return new NoAuthFacadeInRequestScopeRule;
    }

    public function createService0712(): NoAuthHelperInRequestScopeRule
    {
        return new NoAuthHelperInRequestScopeRule;
    }

    public function createService0713(): NoEnvCallsOutsideOfConfigRule
    {
        return new NoEnvCallsOutsideOfConfigRule(
            $this->getParameter('configDirectories'),
            $this->getService('0343'),
            $this->getParameter('singleReflectionFile'),
            $this->getParameter('singleReflectionInsteadOfFile')
        );
    }

    public function createService0714(): NoImplicitQueryBuilderCallRule
    {
        return new NoImplicitQueryBuilderCallRule($this->getService('0616'));
    }

    public function createService0715(): NoMissingTranslationsRule
    {
        return new NoMissingTranslationsRule(
            $this->getService('0597'),
            $this->getService('0690'),
            $this->getService('01108'),
            $this->getParameter('translationDirectories')
        );
    }

    public function createService0716(): NoModelMakeRule
    {
        return new NoModelMakeRule($this->getService('reflectionProvider'));
    }

    public function createService0717(): NoPublicModelScopeAndAccessorRule
    {
        return new NoPublicModelScopeAndAccessorRule;
    }

    public function createService0718(): NoUnnecessaryCollectionCallRule
    {
        return new NoUnnecessaryCollectionCallRule(
            $this->getService('reflectionProvider'),
            $this->getService('0626'),
            $this->getParameter('noUnnecessaryCollectionCallOnly'),
            $this->getParameter('noUnnecessaryCollectionCallExcept'),
            $this->getService('0686')
        );
    }

    public function createService0719(): NoUnnecessaryEnumerableToArrayCallsRule
    {
        return new NoUnnecessaryEnumerableToArrayCallsRule;
    }

    public function createService0720(): OctaneCompatibilityRule
    {
        return new OctaneCompatibilityRule($this->getService('0686'));
    }

    public function createService0721(): BatchableJobChecksCancellationRule
    {
        return new BatchableJobChecksCancellationRule($this->getService('currentPhpVersionSimpleDirectParser'));
    }

    public function createService0722(): BatchedJobIsBatchableRule
    {
        return new BatchedJobIsBatchableRule;
    }

    public function createService0723(): JobDispatchedInTransactionUsesAfterCommitRule
    {
        return new JobDispatchedInTransactionUsesAfterCommitRule(
            $this->getService('reflectionProvider'),
            $this->getService('0686')
        );
    }

    public function createService0724(): JobWithModelPropertyDeclaresSerializesModelsRule
    {
        return new JobWithModelPropertyDeclaresSerializesModelsRule;
    }

    public function createService0725(): NoBatchedUniqueJobRule
    {
        return new NoBatchedUniqueJobRule($this->getService('0686'));
    }

    public function createService0726(): UniqueJobDeclaresUniqueForRule
    {
        return new UniqueJobDeclaresUniqueForRule;
    }

    public function createService0727(): UniqueJobDeclaresUniqueIdRule
    {
        return new UniqueJobDeclaresUniqueIdRule;
    }

    public function createService0728(): UnusedViewsRule
    {
        return new UnusedViewsRule($this->getService('0600'), $this->getService('0690'));
    }

    public function createService0729(): FileExcluderRawFactory
    {
        return new class($this) implements FileExcluderRawFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(array $analyseExcludes): FileExcluder
            {
                return new FileExcluder($this->container->getService('0343'), $analyseExcludes);
            }
        };
    }

    public function createService0730(): ExpressionResultFactory
    {
        return new class($this) implements ExpressionResultFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(
                MutatingScope $scope,
                MutatingScope $beforeScope,
                Expr $expr,
                bool $hasYield,
                bool $isAlwaysTerminating,
                array $throwPoints,
                array $impurePoints,
                ?callable $typeCallback,
                callable $specifyTypesCallback,
                bool $containsNullsafe = false,
                ?IssetabilityDescriptor $issetabilityDescriptor = null,
                ?ExpressionResult $truthyScopeOverrideResult = null,
                ?ExpressionResult $falseyScopeOverrideResult = null,
                ?callable $createTypesCallback = null,
                ?Type $type = null,
                ?Type $nativeType = null,
                ?ArgsResult $argsResult = null,
                ?VariableFlow $variableFlow = null,
                ?Dependencies $dependencies = null
            ): ExpressionResult {
                return new ExpressionResult(
                    $this->container->getService('phpstan.extensionsCollection.PHPStan.Type.ExpressionTypeResolverExtension'),
                    $this->container->getService('0395'),
                    $scope,
                    $beforeScope,
                    $expr,
                    $hasYield,
                    $isAlwaysTerminating,
                    $throwPoints,
                    $impurePoints,
                    $typeCallback,
                    $specifyTypesCallback,
                    $containsNullsafe,
                    $issetabilityDescriptor,
                    $truthyScopeOverrideResult,
                    $falseyScopeOverrideResult,
                    $createTypesCallback,
                    $type,
                    $nativeType,
                    $argsResult,
                    $variableFlow,
                    [],
                    dependencies: $dependencies
                );
            }
        };
    }

    public function createService0731(): InternalScopeFactoryFactory
    {
        return new class($this) implements InternalScopeFactoryFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(?callable $nodeCallback): InternalScopeFactory
            {
                return new LazyInternalScopeFactory($this->container->getService('012'), $nodeCallback);
            }
        };
    }

    public function createService0732(): ResultCacheManagerFactory
    {
        return new class($this) implements ResultCacheManagerFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(array $fileReplacements): ResultCacheManager
            {
                return new ResultCacheManager(
                    $this->container->getService('phpstan.extensionsCollection.PHPStan.Analyser.ResultCache.ResultCacheMetaExtension'),
                    $this->container->getService('0585'),
                    $this->container->getService('fileFinderScan'),
                    $this->container->getService('0543'),
                    $this->container->getService('0582'),
                    $this->container->getService('0522'),
                    $this->container->getParameter('resultCachePath'),
                    $this->container->getParameter('analysedPaths'),
                    $this->container->getParameter('analysedPathsFromConfig'),
                    $this->container->getParameter('composerAutoloaderProjectPaths'),
                    $this->container->getParameter('attributeServicesDirectories'),
                    $this->container->getParameter('attributeServicesClasses'),
                    $this->container->getParameter('usedLevel'),
                    $this->container->getParameter('cliAutoloadFile'),
                    $this->container->getParameter('bootstrapFiles'),
                    $this->container->getParameter('scanFiles'),
                    $this->container->getParameter('scanDirectories'),
                    $this->container->getParameter('stubFiles'),
                    $fileReplacements,
                    $this->container->getParameter('resultCacheChecksProjectExtensionFilesDependencies'),
                    $this->container->getParameter('parametersNotInvalidatingCache'),
                    $this->container->getParameter('resultCacheSkipIfOlderThanDays'),
                    $this->container->getParameter('rootDir'),
                    $this->container->getService('09'),
                    $this->container->getService('06'),
                    $this->container->getService('0348'),
                    $this->container->getService('0487'),
                    $this->container->getService('0534'),
                    $this->container->getService('0531'),
                    $this->container->getParameter('tmpDir')
                );
            }
        };
    }

    public function createService0733(): ClassReflectionFactory
    {
        return new class($this) implements ClassReflectionFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(
                string $displayName,
                ReflectionClass $reflection,
                ?string $anonymousFilename,
                ?TemplateTypeMap $resolvedTemplateTypeMap,
                ?Closure $stubPhpDocBlockCallback,
                ?string $extraCacheKey = null,
                ?TemplateTypeVarianceMap $resolvedCallSiteVarianceMap = null,
                ?bool $finalByKeywordOverride = null
            ): ClassReflection {
                return new ClassReflection(
                    $this->container->getService('0733'),
                    $this->container->getService('reflectionProvider'),
                    $this->container->getService('0507'),
                    $this->container->getService('0117'),
                    $this->container->getService('stubPhpDocProvider'),
                    $this->container->getService('0550'),
                    $this->container->getService('09'),
                    $this->container->getService('0502'),
                    $this->container->getService('0513'),
                    $this->container->getService('0514'),
                    $this->container->getService('014'),
                    $displayName,
                    $reflection,
                    $anonymousFilename,
                    $resolvedTemplateTypeMap,
                    $stubPhpDocBlockCallback,
                    $extraCacheKey,
                    $resolvedCallSiteVarianceMap,
                    $finalByKeywordOverride
                );
            }
        };
    }

    public function createService0734(): FunctionReflectionFactory
    {
        return new class($this) implements FunctionReflectionFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(
                ReflectionFunction $reflection,
                TemplateTypeMap $templateTypeMap,
                array $phpDocParameterTypes,
                ?Type $phpDocReturnType,
                ?Type $phpDocThrowType,
                ?string $deprecatedDescription,
                bool $isDeprecated,
                bool $isInternal,
                ?string $filename,
                ?bool $isPure,
                Assertions $asserts,
                bool $acceptsNamedArguments,
                ?string $phpDocComment,
                array $phpDocParameterOutTypes,
                array $phpDocParameterImmediatelyInvokedCallable,
                array $phpDocParameterClosureThisTypes,
                array $attributes,
                array $phpDocParameterPureUnlessCallableIsImpure,
                array $phpDocParameterPureUnlessParameterPassed
            ): PhpFunctionReflection {
                return new PhpFunctionReflection(
                    $this->container->getService('0507'),
                    $reflection,
                    $this->container->getService('0514'),
                    $this->container->getService('0521'),
                    $templateTypeMap,
                    $phpDocParameterTypes,
                    $phpDocReturnType,
                    $phpDocThrowType,
                    $deprecatedDescription,
                    $isDeprecated,
                    $isInternal,
                    $filename,
                    $isPure,
                    $asserts,
                    $acceptsNamedArguments,
                    $phpDocComment,
                    $phpDocParameterOutTypes,
                    $phpDocParameterImmediatelyInvokedCallable,
                    $phpDocParameterClosureThisTypes,
                    $attributes,
                    $phpDocParameterPureUnlessCallableIsImpure,
                    $phpDocParameterPureUnlessParameterPassed
                );
            }
        };
    }

    public function createService0735(): PhpMethodReflectionFactory
    {
        return new class($this) implements PhpMethodReflectionFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(
                ClassReflection $declaringClass,
                ?ClassReflection $declaringTrait,
                ReflectionMethod $reflection,
                TemplateTypeMap $templateTypeMap,
                array $phpDocParameterTypes,
                ?Type $phpDocReturnType,
                ?Type $phpDocThrowType,
                ?ResolvedPhpDocBlock $resolvedPhpDocBlock,
                ?string $deprecatedDescription,
                bool $isDeprecated,
                bool $isInternal,
                bool $isFinal,
                ?bool $isPure,
                Assertions $asserts,
                ?Type $selfOutType,
                ?string $phpDocComment,
                array $phpDocParameterOutTypes,
                array $immediatelyInvokedCallableParameters,
                array $phpDocClosureThisTypeParameters,
                bool $acceptsNamedArguments,
                array $attributes,
                array $pureUnlessCallableIsImpureParameters,
                array $pureUnlessParameterPassedParameters
            ): PhpMethodReflection {
                return new PhpMethodReflection(
                    $this->container->getService('0507'),
                    $declaringClass,
                    $declaringTrait,
                    $reflection,
                    $this->container->getService('reflectionProvider'),
                    $this->container->getService('0514'),
                    $this->container->getService('0521'),
                    $templateTypeMap,
                    $phpDocParameterTypes,
                    $phpDocReturnType,
                    $phpDocThrowType,
                    $resolvedPhpDocBlock,
                    $deprecatedDescription,
                    $isDeprecated,
                    $isInternal,
                    $isFinal,
                    $isPure,
                    $asserts,
                    $acceptsNamedArguments,
                    $selfOutType,
                    $phpDocComment,
                    $phpDocParameterOutTypes,
                    $immediatelyInvokedCallableParameters,
                    $phpDocClosureThisTypeParameters,
                    $attributes,
                    $pureUnlessCallableIsImpureParameters,
                    $pureUnlessParameterPassedParameters
                );
            }
        };
    }

    public function createService0736(): OptimizedSingleFileSourceLocatorFactory
    {
        return new class($this) implements OptimizedSingleFileSourceLocatorFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(string $fileName): OptimizedSingleFileSourceLocator
            {
                return new OptimizedSingleFileSourceLocator(
                    $this->container->getService('0526'),
                    $this->container->getService('015'),
                    $this->container->getService('09'),
                    $fileName
                );
            }
        };
    }

    public function createService0737(): OptimizedPsrAutoloaderLocatorFactory
    {
        return new class($this) implements OptimizedPsrAutoloaderLocatorFactory
        {
            private $container;

            public function __construct(Container_98276e52e6 $container)
            {
                $this->container = $container;
            }

            public function create(PsrAutoloaderMapping $mapping): OptimizedPsrAutoloaderLocator
            {
                return new OptimizedPsrAutoloaderLocator($mapping, $this->container->getService('0530'));
            }
        };
    }

    public function createService0738(): MissingReturnRule
    {
        return new MissingReturnRule(
            $this->getParameter('checkExplicitMixedMissingReturn'),
            $this->getParameter('checkPhpDocMissingReturn')
        );
    }

    public function createService0739(): NotAnalysedTraitRule
    {
        return new NotAnalysedTraitRule;
    }

    public function createService0740(): ConflictingTraitConstantsRule
    {
        return new ConflictingTraitConstantsRule(
            $this->getService('0507'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0741(): ConstantsInTraitsRule
    {
        return new ConstantsInTraitsRule;
    }

    public function createService0742(): TraitAttributesRule
    {
        return new TraitAttributesRule($this->getService('029'));
    }

    public function createService0743(): DeprecatedCastRule
    {
        return new DeprecatedCastRule;
    }

    public function createService0744(): EchoRule
    {
        return new EchoRule($this->getService('041'));
    }

    public function createService0745(): InvalidCastRule
    {
        return new InvalidCastRule($this->getService('reflectionProvider'), $this->getService('041'));
    }

    public function createService0746(): UnsetCastRule
    {
        return new UnsetCastRule;
    }

    public function createService0747(): InvalidPartOfEncapsedStringRule
    {
        return new InvalidPartOfEncapsedStringRule($this->getService('0540'), $this->getService('041'));
    }

    public function createService0748(): PrintRule
    {
        return new PrintRule($this->getService('041'));
    }

    public function createService0749(): VoidCastRule
    {
        return new VoidCastRule;
    }

    public function createService0750(): BooleanAndConstantConditionRule
    {
        return new BooleanAndConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0751(): BooleanOrConstantConditionRule
    {
        return new BooleanOrConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0752(): ImpossibleCheckTypeMethodCallRule
    {
        return new ImpossibleCheckTypeMethodCallRule(
            $this->getService('027'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0753(): MatchExpressionRule
    {
        return new MatchExpressionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService0754(): StrictComparisonOfDifferentTypesRule
    {
        return new StrictComparisonOfDifferentTypesRule(
            $this->getService('0479'),
            $this->getService('028'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0755(): NumberComparisonOperatorsConstantConditionRule
    {
        return new NumberComparisonOperatorsConstantConditionRule(
            $this->getService('028'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0756(): ElseIfConstantConditionRule
    {
        return new ElseIfConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0757(): ImpossibleCheckTypeFunctionCallRule
    {
        return new ImpossibleCheckTypeFunctionCallRule(
            $this->getService('027'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0758(): WhileLoopAlwaysTrueConditionRule
    {
        return new WhileLoopAlwaysTrueConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0759(): BooleanNotConstantConditionRule
    {
        return new BooleanNotConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0760(): UsageOfVoidMatchExpressionRule
    {
        return new UsageOfVoidMatchExpressionRule;
    }

    public function createService0761(): ConstantConditionInTraitRule
    {
        return new ConstantConditionInTraitRule;
    }

    public function createService0762(): DoWhileLoopConstantConditionRule
    {
        return new DoWhileLoopConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0763(): ImpossibleCheckTypeStaticMethodCallRule
    {
        return new ImpossibleCheckTypeStaticMethodCallRule(
            $this->getService('027'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0764(): FunctionCallConstantConditionRule
    {
        return new FunctionCallConstantConditionRule;
    }

    public function createService0765(): LogicalXorConstantConditionRule
    {
        return new LogicalXorConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0766(): TernaryOperatorConstantConditionRule
    {
        return new TernaryOperatorConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0767(): IfConstantConditionRule
    {
        return new IfConstantConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0768(): ConstantLooseComparisonRule
    {
        return new ConstantLooseComparisonRule(
            $this->getService('028'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0769(): WhileLoopAlwaysFalseConditionRule
    {
        return new WhileLoopAlwaysFalseConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('026'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0770(): InvalidTypesInUnionRule
    {
        return new InvalidTypesInUnionRule;
    }

    public function createService0771(): NullCoalesceRule
    {
        return new NullCoalesceRule(
            $this->getService('075'),
            $this->getService('028'),
            $this->getParameter('featureToggles')['unnecessaryNullCoalesce']
        );
    }

    public function createService0772(): EmptyRule
    {
        return new EmptyRule($this->getService('075'), $this->getService('028'));
    }

    public function createService0773(): UnsetRule
    {
        return new UnsetRule(
            $this->getService('096'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0774(): ThisInStaticStatementRule
    {
        return new ThisInStaticStatementRule;
    }

    public function createService0775(): CompactVariablesRule
    {
        return new CompactVariablesRule($this->getParameter('checkMaybeUndefinedVariables'));
    }

    public function createService0776(): ParameterOutAssignedTypeRule
    {
        return new ParameterOutAssignedTypeRule($this->getService('030'));
    }

    public function createService0777(): VariableCloningRule
    {
        return new VariableCloningRule($this->getService('041'));
    }

    public function createService0778(): ThisInGlobalStatementRule
    {
        return new ThisInGlobalStatementRule;
    }

    public function createService0779(): IssetRule
    {
        return new IssetRule($this->getService('075'), $this->getService('028'));
    }

    public function createService0780(): InvalidVariableAssignRule
    {
        return new InvalidVariableAssignRule;
    }

    public function createService0781(): ParameterOutExecutionEndTypeRule
    {
        return new ParameterOutExecutionEndTypeRule($this->getService('030'));
    }

    public function createService0782(): DefinedVariableRule
    {
        return new DefinedVariableRule(
            $this->getService('074'),
            $this->getParameter('cliArgumentsVariablesRegistered'),
            $this->getParameter('checkMaybeUndefinedVariables')
        );
    }

    public function createService0783(): DateTimeInstantiationRule
    {
        return new DateTimeInstantiationRule;
    }

    public function createService0784(): ValueAssignedToClassConstantRule
    {
        return new ValueAssignedToClassConstantRule(
            $this->getService('0431'),
            $this->getParameter('featureToggles')['checkDynamicConstantNameValues']
        );
    }

    public function createService0785(): FinalPrivateConstantRule
    {
        return new FinalPrivateConstantRule;
    }

    public function createService0786(): NativeTypedClassConstantRule
    {
        return new NativeTypedClassConstantRule;
    }

    public function createService0787(): ClassAsClassConstantRule
    {
        return new ClassAsClassConstantRule;
    }

    public function createService0788(): MissingClassConstantTypehintRule
    {
        return new MissingClassConstantTypehintRule($this->getService('067'));
    }

    public function createService0789(): ConstantRule
    {
        return new ConstantRule($this->getParameter('tips')['discoveringSymbols']);
    }

    public function createService0790(): FinalConstantRule
    {
        return new FinalConstantRule;
    }

    public function createService0791(): MagicConstantContextRule
    {
        return new MagicConstantContextRule;
    }

    public function createService0792(): ConstantAttributesRule
    {
        return new ConstantAttributesRule($this->getService('029'));
    }

    public function createService0793(): DynamicClassConstantFetchRule
    {
        return new DynamicClassConstantFetchRule($this->getService('041'));
    }

    public function createService0794(): OverridingConstantRule
    {
        return new OverridingConstantRule(
            $this->getParameter('checkPhpDocMethodSignatures'),
            $this->getService('032')
        );
    }

    public function createService0795(): NonexistentOffsetInArrayDimFetchRule
    {
        return new NonexistentOffsetInArrayDimFetchRule(
            $this->getService('041'),
            $this->getService('034'),
            $this->getParameter('reportMaybes')
        );
    }

    public function createService0796(): OffsetAccessValueAssignmentRule
    {
        return new OffsetAccessValueAssignmentRule($this->getService('041'));
    }

    public function createService0797(): DuplicateKeysInLiteralArraysRule
    {
        return new DuplicateKeysInLiteralArraysRule($this->getService('0540'), $this->getService('0336'));
    }

    public function createService0798(): InvalidKeyInArrayDimFetchRule
    {
        return new InvalidKeyInArrayDimFetchRule(
            $this->getService('041'),
            $this->getParameter('reportMaybes'),
            $this->getParameter('reportNonIntStringArrayKey'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0799(): DeadForeachRule
    {
        return new DeadForeachRule;
    }

    public function createService0800(): IterableInForeachRule
    {
        return new IterableInForeachRule($this->getService('041'));
    }

    public function createService0801(): OffsetAccessAssignOpRule
    {
        return new OffsetAccessAssignOpRule($this->getService('041'));
    }

    public function createService0802(): ArrayUnpackingRule
    {
        return new ArrayUnpackingRule($this->getService('041'));
    }

    public function createService0803(): OffsetAccessWithoutDimForReadingRule
    {
        return new OffsetAccessWithoutDimForReadingRule;
    }

    public function createService0804(): OffsetAccessAssignmentRule
    {
        return new OffsetAccessAssignmentRule($this->getService('041'));
    }

    public function createService0805(): UnpackIterableInArrayRule
    {
        return new UnpackIterableInArrayRule($this->getService('041'));
    }

    public function createService0806(): ArrayDestructuringRule
    {
        return new ArrayDestructuringRule($this->getService('041'), $this->getService('034'));
    }

    public function createService0807(): InvalidKeyInArrayItemRule
    {
        return new InvalidKeyInArrayItemRule(
            $this->getService('041'),
            $this->getParameter('reportNonIntStringArrayKey'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0808(): PipeOperatorRule
    {
        return new PipeOperatorRule($this->getService('041'));
    }

    public function createService0809(): BacktickRule
    {
        return new BacktickRule($this->getParameter('featureToggles')['checkWholePhpVersionRange']);
    }

    public function createService0810(): InvalidAssignVarRule
    {
        return new InvalidAssignVarRule($this->getService('051'));
    }

    public function createService0811(): InvalidComparisonOperationRule
    {
        return new InvalidComparisonOperationRule(
            $this->getService('041'),
            $this->getService('0337'),
            $this->getParameter('featureToggles')['checkExtensionsForComparisonOperators']
        );
    }

    public function createService0812(): InvalidIncDecOperationRule
    {
        return new InvalidIncDecOperationRule(
            $this->getService('041'),
            $this->getService('09'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0813(): InvalidUnaryOperationRule
    {
        return new InvalidUnaryOperationRule($this->getService('041'));
    }

    public function createService0814(): InvalidBinaryOperationRule
    {
        return new InvalidBinaryOperationRule($this->getService('0540'), $this->getService('041'));
    }

    public function createService0815(): YieldTypeRule
    {
        return new YieldTypeRule($this->getService('041'));
    }

    public function createService0816(): YieldInGeneratorRule
    {
        return new YieldInGeneratorRule($this->getParameter('reportMaybes'));
    }

    public function createService0817(): YieldFromTypeRule
    {
        return new YieldFromTypeRule($this->getService('041'), $this->getParameter('reportMaybes'));
    }

    public function createService0818(): RegularExpressionQuotingRule
    {
        return new RegularExpressionQuotingRule($this->getService('reflectionProvider'), $this->getService('0118'));
    }

    public function createService0819(): RegularExpressionPatternRule
    {
        return new RegularExpressionPatternRule($this->getService('0118'));
    }

    public function createService0820(): InterfaceAncestorsRule
    {
        return new InterfaceAncestorsRule($this->getService('035'), $this->getService('037'));
    }

    public function createService0821(): UsedTraitsRule
    {
        return new UsedTraitsRule($this->getService('0117'), $this->getService('035'));
    }

    public function createService0822(): MethodTagTemplateTypeTraitRule
    {
        return new MethodTagTemplateTypeTraitRule(
            $this->getService('038'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0823(): EnumTemplateTypeRule
    {
        return new EnumTemplateTypeRule;
    }

    public function createService0824(): InterfaceTemplateTypeRule
    {
        return new InterfaceTemplateTypeRule($this->getService('040'));
    }

    public function createService0825(): MethodTemplateTypeRule
    {
        return new MethodTemplateTypeRule($this->getService('0117'), $this->getService('040'));
    }

    public function createService0826(): ClassTemplateTypeRule
    {
        return new ClassTemplateTypeRule($this->getService('040'));
    }

    public function createService0827(): TraitTemplateTypeRule
    {
        return new TraitTemplateTypeRule($this->getService('0117'), $this->getService('040'));
    }

    public function createService0828(): ClassAncestorsRule
    {
        return new ClassAncestorsRule($this->getService('035'), $this->getService('037'));
    }

    public function createService0829(): FunctionSignatureVarianceRule
    {
        return new FunctionSignatureVarianceRule($this->getService('036'));
    }

    public function createService0830(): PropertyVarianceRule
    {
        return new PropertyVarianceRule($this->getService('036'));
    }

    public function createService0831(): EnumAncestorsRule
    {
        return new EnumAncestorsRule($this->getService('035'), $this->getService('037'));
    }

    public function createService0832(): MethodTagTemplateTypeRule
    {
        return new MethodTagTemplateTypeRule($this->getService('038'));
    }

    public function createService0833(): MethodSignatureVarianceRule
    {
        return new MethodSignatureVarianceRule($this->getService('036'));
    }

    public function createService0834(): FunctionTemplateTypeRule
    {
        return new FunctionTemplateTypeRule($this->getService('0117'), $this->getService('040'));
    }

    public function createService0835(): StaticMethodCallableRule
    {
        return new StaticMethodCallableRule($this->getService('047'), $this->getService('071'));
    }

    public function createService0836(): CallToStaticMethodStatementWithNoDiscardRule
    {
        return new CallToStaticMethodStatementWithNoDiscardRule(
            $this->getService('041'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0837(): MethodCallableRule
    {
        return new MethodCallableRule($this->getService('049'), $this->getService('071'));
    }

    public function createService0838(): ReturnTypeRule
    {
        return new ReturnTypeRule($this->getService('0100'));
    }

    public function createService0839(): MethodVisibilityInInterfaceRule
    {
        return new MethodVisibilityInInterfaceRule;
    }

    public function createService0840(): MissingMagicSerializationMethodsRule
    {
        return new MissingMagicSerializationMethodsRule($this->getParameter('featureToggles')['checkWholePhpVersionRange']);
    }

    public function createService0841(): MissingMethodImplementationRule
    {
        return new MissingMethodImplementationRule;
    }

    public function createService0842(): ConstructorReturnTypeRule
    {
        return new ConstructorReturnTypeRule;
    }

    public function createService0843(): MissingMethodReturnTypehintRule
    {
        return new MissingMethodReturnTypehintRule($this->getService('067'));
    }

    public function createService0844(): OverridingMethodRule
    {
        return new OverridingMethodRule(
            $this->getService('09'),
            $this->getService('043'),
            $this->getParameter('checkPhpDocMethodSignatures'),
            $this->getService('042'),
            $this->getService('045'),
            $this->getService('046'),
            $this->getService('048'),
            $this->getParameter('checkMissingOverrideMethodAttribute'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0845(): CallToMethodStatementWithoutSideEffectsRule
    {
        return new CallToMethodStatementWithoutSideEffectsRule($this->getService('041'));
    }

    public function createService0846(): AbstractPrivateMethodRule
    {
        return new AbstractPrivateMethodRule;
    }

    public function createService0847(): ConsistentConstructorDeclarationRule
    {
        return new ConsistentConstructorDeclarationRule;
    }

    public function createService0848(): FinalPrivateMethodRule
    {
        return new FinalPrivateMethodRule;
    }

    public function createService0849(): MissingMethodParameterTypehintRule
    {
        return new MissingMethodParameterTypehintRule($this->getService('067'));
    }

    public function createService0850(): CallStaticMethodsRule
    {
        return new CallStaticMethodsRule(
            $this->getService('047'),
            $this->getService('071'),
            $this->getService('074')
        );
    }

    public function createService0851(): CallPrivateMethodThroughStaticRule
    {
        return new CallPrivateMethodThroughStaticRule;
    }

    public function createService0852(): MethodAttributesRule
    {
        return new MethodAttributesRule($this->getService('029'));
    }

    public function createService0853(): CallMethodsRule
    {
        return new CallMethodsRule($this->getService('049'), $this->getService('071'), $this->getService('074'));
    }

    public function createService0854(): CallToStaticMethodStatementWithoutSideEffectsRule
    {
        return new CallToStaticMethodStatementWithoutSideEffectsRule(
            $this->getService('041'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService0855(): MissingMethodSelfOutTypeRule
    {
        return new MissingMethodSelfOutTypeRule($this->getService('067'));
    }

    public function createService0856(): AbstractMethodInNonAbstractClassRule
    {
        return new AbstractMethodInNonAbstractClassRule;
    }

    public function createService0857(): ExistingClassesInTypehintsRule
    {
        return new ExistingClassesInTypehintsRule($this->getService('052'));
    }

    public function createService0858(): IncompatibleDefaultParameterTypeRule
    {
        return new IncompatibleDefaultParameterTypeRule;
    }

    public function createService0859(): NullsafeMethodCallRule
    {
        return new NullsafeMethodCallRule(
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0860(): ConsistentConstructorRule
    {
        return new ConsistentConstructorRule(
            $this->getService('080'),
            $this->getService('042'),
            $this->getService('045')
        );
    }

    public function createService0861(): CallToConstructorStatementWithoutSideEffectsRule
    {
        return new CallToConstructorStatementWithoutSideEffectsRule($this->getService('reflectionProvider'));
    }

    public function createService0862(): CallToMethodStatementWithNoDiscardRule
    {
        return new CallToMethodStatementWithNoDiscardRule($this->getService('041'));
    }

    public function createService0863(): MethodCallWithPossiblyRenamedNamedArgumentRule
    {
        return new MethodCallWithPossiblyRenamedNamedArgumentRule;
    }

    public function createService0864(): MissingFunctionReturnTypehintRule
    {
        return new MissingFunctionReturnTypehintRule($this->getService('067'));
    }

    public function createService0865(): ExistingClassesInArrowFunctionTypehintsRule
    {
        return new ExistingClassesInArrowFunctionTypehintsRule($this->getService('052'));
    }

    public function createService0866(): FunctionCallableRule
    {
        return new FunctionCallableRule(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getService('071'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('reportMaybes')
        );
    }

    public function createService0867(): InvalidParameterNameRule
    {
        return new InvalidParameterNameRule;
    }

    public function createService0868(): PHPStan\Rules\Functions\ReturnTypeRule
    {
        return new PHPStan\Rules\Functions\ReturnTypeRule($this->getService('0100'));
    }

    public function createService0869(): UselessFunctionReturnValueRule
    {
        return new UselessFunctionReturnValueRule($this->getService('reflectionProvider'));
    }

    public function createService0870(): MissingFunctionParameterTypehintRule
    {
        return new MissingFunctionParameterTypehintRule($this->getService('067'));
    }

    public function createService0871(): CallToFunctionParametersRule
    {
        return new CallToFunctionParametersRule(
            $this->getService('reflectionProvider'),
            $this->getService('071')
        );
    }

    public function createService0872(): CallUserFuncRule
    {
        return new CallUserFuncRule($this->getService('reflectionProvider'), $this->getService('071'));
    }

    public function createService0873(): ImplodeParameterCastableToStringRule
    {
        return new ImplodeParameterCastableToStringRule(
            $this->getService('reflectionProvider'),
            $this->getService('099')
        );
    }

    public function createService0874(): ArrayFilterRule
    {
        return new ArrayFilterRule(
            $this->getService('reflectionProvider'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0875(): ArrowFunctionAttributesRule
    {
        return new ArrowFunctionAttributesRule($this->getService('029'));
    }

    public function createService0876(): ReturnTypeAfterFinallyRule
    {
        return new ReturnTypeAfterFinallyRule($this->getService('041'));
    }

    public function createService0877(): ClosureAttributesRule
    {
        return new ClosureAttributesRule($this->getService('029'));
    }

    public function createService0878(): SortParameterCastableToStringRule
    {
        return new SortParameterCastableToStringRule(
            $this->getService('reflectionProvider'),
            $this->getService('099')
        );
    }

    public function createService0879(): ReturnNullsafeByRefRule
    {
        return new ReturnNullsafeByRefRule($this->getService('051'));
    }

    public function createService0880(): IncompatibleArrowFunctionDefaultParameterTypeRule
    {
        return new IncompatibleArrowFunctionDefaultParameterTypeRule;
    }

    public function createService0881(): ArrayValuesRule
    {
        return new ArrayValuesRule(
            $this->getService('reflectionProvider'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0882(): ParamAttributesRule
    {
        return new ParamAttributesRule($this->getService('029'));
    }

    public function createService0883(): DefineParametersRule
    {
        return new DefineParametersRule($this->getParameter('featureToggles')['checkWholePhpVersionRange']);
    }

    public function createService0884(): CallToFunctionStatementWithNoDiscardRule
    {
        return new CallToFunctionStatementWithNoDiscardRule($this->getService('reflectionProvider'));
    }

    public function createService0885(): CallCallablesRule
    {
        return new CallCallablesRule(
            $this->getService('071'),
            $this->getService('041'),
            $this->getService('reflectionProvider'),
            $this->getParameter('reportMaybes')
        );
    }

    public function createService0886(): CallToFunctionStatementWithoutSideEffectsRule
    {
        return new CallToFunctionStatementWithoutSideEffectsRule($this->getService('reflectionProvider'));
    }

    public function createService0887(): InvalidLexicalVariablesInClosureUseRule
    {
        return new InvalidLexicalVariablesInClosureUseRule;
    }

    public function createService0888(): VariadicParametersDeclarationRule
    {
        return new VariadicParametersDeclarationRule;
    }

    public function createService0889(): FilterVarRule
    {
        return new FilterVarRule(
            $this->getService('reflectionProvider'),
            $this->getService('0176'),
            $this->getService('0260'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService0890(): PHPStan\Rules\Functions\ExistingClassesInTypehintsRule
    {
        return new PHPStan\Rules\Functions\ExistingClassesInTypehintsRule($this->getService('052'));
    }

    public function createService0891(): PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule
    {
        return new PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule;
    }

    public function createService0892(): RedefinedParametersRule
    {
        return new RedefinedParametersRule;
    }

    public function createService0893(): ClosureReturnTypeRule
    {
        return new ClosureReturnTypeRule($this->getService('0100'));
    }

    public function createService0894(): IncompatibleClosureDefaultParameterTypeRule
    {
        return new IncompatibleClosureDefaultParameterTypeRule;
    }

    public function createService0895(): ExistingClassesInClosureTypehintsRule
    {
        return new ExistingClassesInClosureTypehintsRule($this->getService('052'));
    }

    public function createService0896(): RandomIntParametersRule
    {
        return new RandomIntParametersRule(
            $this->getService('reflectionProvider'),
            $this->getService('09'),
            $this->getParameter('reportMaybes')
        );
    }

    public function createService0897(): ArrowFunctionReturnTypeRule
    {
        return new ArrowFunctionReturnTypeRule($this->getService('0100'));
    }

    public function createService0898(): CallToNonExistentFunctionRule
    {
        return new CallToNonExistentFunctionRule(
            $this->getService('reflectionProvider'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0899(): InnerFunctionRule
    {
        return new InnerFunctionRule;
    }

    public function createService0900(): FunctionAttributesRule
    {
        return new FunctionAttributesRule($this->getService('029'));
    }

    public function createService0901(): ParameterCastableToStringRule
    {
        return new ParameterCastableToStringRule(
            $this->getService('reflectionProvider'),
            $this->getService('099')
        );
    }

    public function createService0902(): PrintfParametersRule
    {
        return new PrintfParametersRule($this->getService('0126'), $this->getService('reflectionProvider'));
    }

    public function createService0903(): PrintfArrayParametersRule
    {
        return new PrintfArrayParametersRule($this->getService('0126'), $this->getService('reflectionProvider'));
    }

    public function createService0904(): ArrowFunctionReturnNullsafeByRefRule
    {
        return new ArrowFunctionReturnNullsafeByRefRule($this->getService('051'));
    }

    public function createService0905(): UnusedClosureUsesRule
    {
        return new UnusedClosureUsesRule(
            $this->getParameter('featureToggles')['reportPreciseLineForUnusedFunctionParameter'],
            $this->getParameter('featureToggles')['unusedParameters']
        );
    }

    public function createService0906(): OverwrittenExitPointByFinallyRule
    {
        return new OverwrittenExitPointByFinallyRule;
    }

    public function createService0907(): ThrowsVoidFunctionWithExplicitThrowPointRule
    {
        return new ThrowsVoidFunctionWithExplicitThrowPointRule(
            $this->getService('exceptionTypeResolver'),
            $this->getParameter('exceptions')['check']['missingCheckedExceptionInThrows']
        );
    }

    public function createService0908(): ThrowExpressionRule
    {
        return new ThrowExpressionRule;
    }

    public function createService0909(): ReturnInFinallyRule
    {
        return new ReturnInFinallyRule($this->getParameter('featureToggles')['checkWholePhpVersionRange']);
    }

    public function createService0910(): ThrowsVoidMethodWithExplicitThrowPointRule
    {
        return new ThrowsVoidMethodWithExplicitThrowPointRule(
            $this->getService('exceptionTypeResolver'),
            $this->getParameter('exceptions')['check']['missingCheckedExceptionInThrows']
        );
    }

    public function createService0911(): ThrowsVoidPropertyHookWithExplicitThrowPointRule
    {
        return new ThrowsVoidPropertyHookWithExplicitThrowPointRule(
            $this->getService('exceptionTypeResolver'),
            $this->getParameter('exceptions')['check']['missingCheckedExceptionInThrows']
        );
    }

    public function createService0912(): CatchWithUnthrownExceptionRule
    {
        return new CatchWithUnthrownExceptionRule(
            $this->getService('exceptionTypeResolver'),
            $this->getService('028'),
            $this->getParameter('exceptions')['reportUncheckedExceptionDeadCatch']
        );
    }

    public function createService0913(): ThrowExprTypeRule
    {
        return new ThrowExprTypeRule($this->getService('041'));
    }

    public function createService0914(): CaughtExceptionExistenceRule
    {
        return new CaughtExceptionExistenceRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0915(): NoncapturingCatchRule
    {
        return new NoncapturingCatchRule;
    }

    public function createService0916(): PurePropertyHookRule
    {
        return new PurePropertyHookRule($this->getService('069'));
    }

    public function createService0917(): PureFunctionRule
    {
        return new PureFunctionRule($this->getService('069'));
    }

    public function createService0918(): PureMethodRule
    {
        return new PureMethodRule($this->getService('069'));
    }

    public function createService0919(): GotoUndefinedLabelRule
    {
        return new GotoUndefinedLabelRule;
    }

    public function createService0920(): DeclareStrictTypesRule
    {
        return new DeclareStrictTypesRule($this->getService('0540'));
    }

    public function createService0921(): ContinueBreakInLoopRule
    {
        return new ContinueBreakInLoopRule;
    }

    public function createService0922(): RequireFileExistsRule
    {
        return new RequireFileExistsRule(
            $this->getService('0540'),
            $this->getParameter('featureToggles')['magicDirInInclude'],
            $this->getService('0343'),
            $this->getService('0341')
        );
    }

    public function createService0923(): NoopRule
    {
        return new NoopRule($this->getService('0540'));
    }

    public function createService0924(): CallToFunctionStatementWithoutImpurePointsRule
    {
        return new CallToFunctionStatementWithoutImpurePointsRule($this->getService('070'));
    }

    public function createService0925(): UnusedPrivateConstantRule
    {
        return new UnusedPrivateConstantRule($this->getService('phpstan.extensionsCollection.PHPStan.Rules.Constants.AlwaysUsedClassConstantsExtension'));
    }

    public function createService0926(): UnusedPrivatePropertyRule
    {
        return new UnusedPrivatePropertyRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.Properties.ReadWritePropertiesExtension'),
            $this->getParameter('propertyAlwaysWrittenTags'),
            $this->getParameter('propertyAlwaysReadTags'),
            $this->getParameter('checkUninitializedProperties')
        );
    }

    public function createService0927(): CallToMethodStatementWithoutImpurePointsRule
    {
        return new CallToMethodStatementWithoutImpurePointsRule($this->getService('070'));
    }

    public function createService0928(): CallToConstructorStatementWithoutImpurePointsRule
    {
        return new CallToConstructorStatementWithoutImpurePointsRule($this->getService('070'));
    }

    public function createService0929(): UnreachableStatementRule
    {
        return new UnreachableStatementRule;
    }

    public function createService0930(): UnusedPrivateMethodRule
    {
        return new UnusedPrivateMethodRule($this->getService('phpstan.extensionsCollection.PHPStan.Rules.Methods.AlwaysUsedMethodExtension'));
    }

    public function createService0931(): CallToStaticMethodStatementWithoutImpurePointsRule
    {
        return new CallToStaticMethodStatementWithoutImpurePointsRule($this->getService('070'));
    }

    public function createService0932(): TooWideMethodReturnTypehintRule
    {
        return new TooWideMethodReturnTypehintRule(
            $this->getParameter('checkTooWideReturnTypesInProtectedAndPublicMethods'),
            $this->getService('073')
        );
    }

    public function createService0933(): TooWideFunctionReturnTypehintRule
    {
        return new TooWideFunctionReturnTypehintRule($this->getService('073'));
    }

    public function createService0934(): TooWideMethodParameterOutTypeRule
    {
        return new TooWideMethodParameterOutTypeRule(
            $this->getService('072'),
            $this->getParameter('checkTooWideParameterOutInProtectedAndPublicMethods')
        );
    }

    public function createService0935(): TooWideClosureReturnTypehintRule
    {
        return new TooWideClosureReturnTypehintRule($this->getService('073'));
    }

    public function createService0936(): TooWideFunctionParameterOutTypeRule
    {
        return new TooWideFunctionParameterOutTypeRule($this->getService('072'));
    }

    public function createService0937(): TooWideArrowFunctionReturnTypehintRule
    {
        return new TooWideArrowFunctionReturnTypehintRule($this->getService('073'));
    }

    public function createService0938(): TooWidePropertyTypeRule
    {
        return new TooWidePropertyTypeRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.Properties.ReadWritePropertiesExtension'),
            $this->getService('073')
        );
    }

    public function createService0939(): UsedNamesRule
    {
        return new UsedNamesRule;
    }

    public function createService0940(): FileWhitespaceRule
    {
        return new FileWhitespaceRule;
    }

    public function createService0941(): IgnoreParseErrorRule
    {
        return new IgnoreParseErrorRule;
    }

    public function createService0942(): InstantiationRule
    {
        return new InstantiationRule(
            $this->getService('phpstan.extensionsCollection.PHPStan.Rules.RestrictedUsage.RestrictedMethodUsageExtension'),
            $this->getService('reflectionProvider'),
            $this->getService('071'),
            $this->getService('066'),
            $this->getService('041'),
            $this->getService('080'),
            $this->getParameter('featureToggles')['newOnNonObject'],
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0943(): MixinTraitRule
    {
        return new MixinTraitRule($this->getService('081'), $this->getService('reflectionProvider'));
    }

    public function createService0944(): ClassConstantRule
    {
        return new ClassConstantRule(
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getService('066'),
            $this->getService('074')
        );
    }

    public function createService0945(): AllowedSubTypesRule
    {
        return new AllowedSubTypesRule;
    }

    public function createService0946(): ExistingClassInInstanceOfRule
    {
        return new ExistingClassInInstanceOfRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0947(): MethodTagTraitUseRule
    {
        return new MethodTagTraitUseRule($this->getService('079'));
    }

    public function createService0948(): EnumSanityRule
    {
        return new EnumSanityRule($this->getService('0507'));
    }

    public function createService0949(): ClassAttributesRule
    {
        return new ClassAttributesRule($this->getService('029'));
    }

    public function createService0950(): ClassConstantAttributesRule
    {
        return new ClassConstantAttributesRule($this->getService('029'));
    }

    public function createService0951(): TraitAttributeClassRule
    {
        return new TraitAttributeClassRule;
    }

    public function createService0952(): AccessPrivateConstantThroughStaticRule
    {
        return new AccessPrivateConstantThroughStaticRule;
    }

    public function createService0953(): NewStaticRule
    {
        return new NewStaticRule($this->getService('09'), $this->getService('080'));
    }

    public function createService0954(): RequireExtendsRule
    {
        return new RequireExtendsRule;
    }

    public function createService0955(): ImpossibleInstanceOfRule
    {
        return new ImpossibleInstanceOfRule(
            $this->getService('041'),
            $this->getService('028'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('reportAlwaysTrueInLastCondition'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService0956(): RequireImplementsRule
    {
        return new RequireImplementsRule;
    }

    public function createService0957(): LocalTypeAliasesRule
    {
        return new LocalTypeAliasesRule($this->getService('077'));
    }

    public function createService0958(): ExistingClassInClassExtendsRule
    {
        return new ExistingClassInClassExtendsRule(
            $this->getService('066'),
            $this->getService('reflectionProvider'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0959(): PropertyTagRule
    {
        return new PropertyTagRule($this->getService('076'));
    }

    public function createService0960(): PropertyTagTraitUseRule
    {
        return new PropertyTagTraitUseRule($this->getService('076'));
    }

    public function createService0961(): LocalTypeTraitAliasesRule
    {
        return new LocalTypeTraitAliasesRule($this->getService('077'), $this->getService('reflectionProvider'));
    }

    public function createService0962(): InstantiationCallableRule
    {
        return new InstantiationCallableRule;
    }

    public function createService0963(): DuplicateDeclarationRule
    {
        return new DuplicateDeclarationRule($this->getService('078'));
    }

    public function createService0964(): ExistingClassesInInterfaceExtendsRule
    {
        return new ExistingClassesInInterfaceExtendsRule(
            $this->getService('066'),
            $this->getService('reflectionProvider'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0965(): ReadOnlyClassRule
    {
        return new ReadOnlyClassRule;
    }

    public function createService0966(): NonClassAttributeClassRule
    {
        return new NonClassAttributeClassRule;
    }

    public function createService0967(): UnusedConstructorParametersRule
    {
        return new UnusedConstructorParametersRule(
            $this->getService('068'),
            $this->getParameter('featureToggles')['reportPreciseLineForUnusedFunctionParameter'],
            $this->getParameter('featureToggles')['unusedParameters']
        );
    }

    public function createService0968(): MixinTraitUseRule
    {
        return new MixinTraitUseRule($this->getService('081'));
    }

    public function createService0969(): PropertyTagTraitRule
    {
        return new PropertyTagTraitRule($this->getService('076'), $this->getService('reflectionProvider'));
    }

    public function createService0970(): ExistingClassInTraitUseRule
    {
        return new ExistingClassInTraitUseRule(
            $this->getService('066'),
            $this->getService('reflectionProvider'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0971(): LocalTypeTraitUseAliasesRule
    {
        return new LocalTypeTraitUseAliasesRule($this->getService('077'));
    }

    public function createService0972(): MethodTagRule
    {
        return new MethodTagRule($this->getService('079'));
    }

    public function createService0973(): MixinRule
    {
        return new MixinRule($this->getService('081'));
    }

    public function createService0974(): MethodTagTraitRule
    {
        return new MethodTagTraitRule($this->getService('079'), $this->getService('reflectionProvider'));
    }

    public function createService0975(): DuplicateTraitDeclarationRule
    {
        return new DuplicateTraitDeclarationRule($this->getService('078'));
    }

    public function createService0976(): ExistingClassesInClassImplementsRule
    {
        return new ExistingClassesInClassImplementsRule(
            $this->getService('066'),
            $this->getService('reflectionProvider'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0977(): InvalidPromotedPropertiesRule
    {
        return new InvalidPromotedPropertiesRule;
    }

    public function createService0978(): ExistingClassesInEnumImplementsRule
    {
        return new ExistingClassesInEnumImplementsRule(
            $this->getService('066'),
            $this->getService('reflectionProvider'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0979(): IncompatiblePropertyHookPhpDocTypeRule
    {
        return new IncompatiblePropertyHookPhpDocTypeRule($this->getService('0117'), $this->getService('082'));
    }

    public function createService0980(): InvalidPhpDocVarTagTypeRule
    {
        return new InvalidPhpDocVarTagTypeRule(
            $this->getService('0117'),
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('039'),
            $this->getService('067'),
            $this->getService('083'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkMissingVarTagTypehint'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0981(): SealedDefinitionTraitRule
    {
        return new SealedDefinitionTraitRule($this->getService('reflectionProvider'));
    }

    public function createService0982(): InvalidPhpDocTagValueRule
    {
        return new InvalidPhpDocTagValueRule($this->getService('01073'), $this->getService('01076'));
    }

    public function createService0983(): RequireExtendsDefinitionClassRule
    {
        return new RequireExtendsDefinitionClassRule($this->getService('087'));
    }

    public function createService0984(): FunctionConditionalReturnTypeRule
    {
        return new FunctionConditionalReturnTypeRule($this->getService('086'));
    }

    public function createService0985(): IncompatibleClassConstantPhpDocTypeRule
    {
        return new IncompatibleClassConstantPhpDocTypeRule($this->getService('039'), $this->getService('083'));
    }

    public function createService0986(): InvalidPHPStanDocTagRule
    {
        return new InvalidPHPStanDocTagRule($this->getService('01073'), $this->getService('01076'));
    }

    public function createService0987(): InvalidThrowsPhpDocValueRule
    {
        return new InvalidThrowsPhpDocValueRule($this->getService('0117'));
    }

    public function createService0988(): IncompatibleParamImmediatelyInvokedCallableRule
    {
        return new IncompatibleParamImmediatelyInvokedCallableRule($this->getService('0117'));
    }

    public function createService0989(): VarTagChangedExpressionTypeRule
    {
        return new VarTagChangedExpressionTypeRule($this->getService('085'));
    }

    public function createService0990(): IncompatibleSelfOutTypeRule
    {
        return new IncompatibleSelfOutTypeRule($this->getService('083'), $this->getService('039'));
    }

    public function createService0991(): RequireImplementsDefinitionClassRule
    {
        return new RequireImplementsDefinitionClassRule;
    }

    public function createService0992(): SealedDefinitionClassRule
    {
        return new SealedDefinitionClassRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0993(): WrongVariableNameInVarTagRule
    {
        return new WrongVariableNameInVarTagRule($this->getService('0117'), $this->getService('085'));
    }

    public function createService0994(): MethodConditionalReturnTypeRule
    {
        return new MethodConditionalReturnTypeRule($this->getService('086'));
    }

    public function createService0995(): IncompatiblePhpDocTypeRule
    {
        return new IncompatiblePhpDocTypeRule($this->getService('0117'), $this->getService('082'));
    }

    public function createService0996(): IncompatiblePropertyPhpDocTypeRule
    {
        return new IncompatiblePropertyPhpDocTypeRule(
            $this->getService('039'),
            $this->getService('083'),
            $this->getService('088')
        );
    }

    public function createService0997(): RequireImplementsDefinitionTraitRule
    {
        return new RequireImplementsDefinitionTraitRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService0998(): FunctionAssertRule
    {
        return new FunctionAssertRule($this->getService('084'));
    }

    public function createService0999(): RequireExtendsDefinitionTraitRule
    {
        return new RequireExtendsDefinitionTraitRule(
            $this->getService('reflectionProvider'),
            $this->getService('087')
        );
    }

    public function createService01000(): MethodAssertRule
    {
        return new MethodAssertRule($this->getService('084'));
    }

    public function createService01001(): GetTemplateTypeRule
    {
        return new GetTemplateTypeRule($this->getService('reflectionProvider'));
    }

    public function createService01002(): ApiInstantiationRule
    {
        return new ApiInstantiationRule($this->getService('090'), $this->getService('reflectionProvider'));
    }

    public function createService01003(): OldPhpParser4ClassRule
    {
        return new OldPhpParser4ClassRule;
    }

    public function createService01004(): ApiInstanceofRule
    {
        return new ApiInstanceofRule($this->getService('090'), $this->getService('reflectionProvider'));
    }

    public function createService01005(): ApiInstanceofTypeRule
    {
        return new ApiInstanceofTypeRule($this->getService('reflectionProvider'));
    }

    public function createService01006(): NodeConnectingVisitorAttributesRule
    {
        return new NodeConnectingVisitorAttributesRule;
    }

    public function createService01007(): PhpStanNamespaceIn3rdPartyPackageRule
    {
        return new PhpStanNamespaceIn3rdPartyPackageRule($this->getService('090'));
    }

    public function createService01008(): ExistingNamesInGroupUseRule
    {
        return new ExistingNamesInGroupUseRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService01009(): ExistingNamesInUseRule
    {
        return new ExistingNamesInUseRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getParameter('checkFunctionNameCase'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService01010(): InvalidCallablePropertyTypeRule
    {
        return new InvalidCallablePropertyTypeRule;
    }

    public function createService01011(): TypesAssignedToPropertiesRule
    {
        return new TypesAssignedToPropertiesRule($this->getService('041'), $this->getService('096'));
    }

    public function createService01012(): ReadOnlyPropertyRule
    {
        return new ReadOnlyPropertyRule;
    }

    public function createService01013(): ExistingClassesInPropertiesRule
    {
        return new ExistingClassesInPropertiesRule(
            $this->getService('reflectionProvider'),
            $this->getService('066'),
            $this->getService('083'),
            $this->getService('09'),
            $this->getParameter('checkClassCaseSensitivity'),
            $this->getParameter('checkThisOnly'),
            $this->getParameter('tips')['discoveringSymbols']
        );
    }

    public function createService01014(): SetNonVirtualPropertyHookAssignRule
    {
        return new SetNonVirtualPropertyHookAssignRule;
    }

    public function createService01015(): PropertyInClassRule
    {
        return new PropertyInClassRule;
    }

    public function createService01016(): WritingToReadOnlyPropertiesRule
    {
        return new WritingToReadOnlyPropertiesRule(
            $this->getService('041'),
            $this->getService('098'),
            $this->getService('096'),
            $this->getParameter('checkThisOnly')
        );
    }

    public function createService01017(): ExistingClassesInPropertyHookTypehintsRule
    {
        return new ExistingClassesInPropertyHookTypehintsRule($this->getService('052'));
    }

    public function createService01018(): NullsafePropertyFetchRule
    {
        return new NullsafePropertyFetchRule(
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService01019(): PropertyAssignRefRule
    {
        return new PropertyAssignRefRule(
            $this->getService('096'),
            $this->getParameter('featureToggles')['checkWholePhpVersionRange']
        );
    }

    public function createService01020(): PropertyHookAttributesRule
    {
        return new PropertyHookAttributesRule($this->getService('029'));
    }

    public function createService01021(): ReadingWriteOnlyPropertiesRule
    {
        return new ReadingWriteOnlyPropertiesRule(
            $this->getService('098'),
            $this->getService('096'),
            $this->getService('041'),
            $this->getParameter('checkThisOnly')
        );
    }

    public function createService01022(): PropertyAttributesRule
    {
        return new PropertyAttributesRule($this->getService('029'));
    }

    public function createService01023(): SetPropertyHookParameterRule
    {
        return new SetPropertyHookParameterRule(
            $this->getService('067'),
            $this->getParameter('checkPhpDocMethodSignatures'),
            $this->getParameter('checkMissingTypehints')
        );
    }

    public function createService01024(): ReadOnlyByPhpDocPropertyAssignRefRule
    {
        return new ReadOnlyByPhpDocPropertyAssignRefRule($this->getService('096'));
    }

    public function createService01025(): PropertiesInInterfaceRule
    {
        return new PropertiesInInterfaceRule;
    }

    public function createService01026(): ReadOnlyPropertyAssignRule
    {
        return new ReadOnlyPropertyAssignRule($this->getService('096'), $this->getService('0515'));
    }

    public function createService01027(): OverridingPropertyRule
    {
        return new OverridingPropertyRule(
            $this->getService('09'),
            $this->getService('048'),
            $this->getService('042'),
            $this->getParameter('checkPhpDocMethodSignatures'),
            $this->getParameter('reportMaybesInPropertyPhpDocTypes'),
            $this->getParameter('checkMissingOverridePropertyAttribute'),
            $this->getParameter('checkMissingOverrideMethodAttribute')
        );
    }

    public function createService01028(): GetNonVirtualPropertyHookReadRule
    {
        return new GetNonVirtualPropertyHookReadRule;
    }

    public function createService01029(): ReadOnlyByPhpDocPropertyAssignRule
    {
        return new ReadOnlyByPhpDocPropertyAssignRule($this->getService('096'), $this->getService('0515'));
    }

    public function createService01030(): MissingPropertyTypehintRule
    {
        return new MissingPropertyTypehintRule($this->getService('067'));
    }

    public function createService01031(): AccessPropertiesInAssignRule
    {
        return new AccessPropertiesInAssignRule($this->getService('097'));
    }

    public function createService01032(): ReadOnlyPropertyAssignRefRule
    {
        return new ReadOnlyPropertyAssignRefRule($this->getService('096'));
    }

    public function createService01033(): DefaultValueTypesAssignedToPropertiesRule
    {
        return new DefaultValueTypesAssignedToPropertiesRule($this->getService('041'));
    }

    public function createService01034(): MissingReadOnlyByPhpDocPropertyAssignRule
    {
        return new MissingReadOnlyByPhpDocPropertyAssignRule($this->getService('0515'));
    }

    public function createService01035(): MissingReadOnlyPropertyAssignRule
    {
        return new MissingReadOnlyPropertyAssignRule($this->getService('0515'));
    }

    public function createService01036(): ReadOnlyByPhpDocPropertyRule
    {
        return new ReadOnlyByPhpDocPropertyRule;
    }

    public function createService01037(): AccessPropertiesRule
    {
        return new AccessPropertiesRule($this->getService('097'));
    }

    public function createService01038(): AccessStaticPropertiesRule
    {
        return new AccessStaticPropertiesRule($this->getService('095'));
    }

    public function createService01039(): AccessStaticPropertiesInAssignRule
    {
        return new AccessStaticPropertiesInAssignRule($this->getService('095'));
    }

    public function createService01040(): AccessPrivatePropertyThroughStaticRule
    {
        return new AccessPrivatePropertyThroughStaticRule;
    }

    public function createService01041(): EnumCaseAttributesRule
    {
        return new EnumCaseAttributesRule($this->getService('029'));
    }

    public function createService01042(): EnumCaseOutsideEnumRule
    {
        return new EnumCaseOutsideEnumRule;
    }

    public function createService01043(): OverridingEnumCaseRule
    {
        return new OverridingEnumCaseRule(
            $this->getParameter('checkPhpDocMethodSignatures'),
            $this->getService('032')
        );
    }

    public function createService01044(): SwitchConditionRule
    {
        return new SwitchConditionRule(
            $this->getService('025'),
            $this->getService('028'),
            $this->getService('0540'),
            $this->getParameter('treatPhpDocTypesAsCertain')
        );
    }

    public function createService01045(): ImpossibleInArrayHaystackFiniteTypesRule
    {
        return new ImpossibleInArrayHaystackFiniteTypesRule(
            $this->getService('0507'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getService('reflectionProvider')
        );
    }

    public function createService01046(): AssignToByRefExprFromForeachRule
    {
        return new AssignToByRefExprFromForeachRule($this->getService('0540'));
    }

    public function createService01047(): DateIntervalInstantiationRule
    {
        return new DateIntervalInstantiationRule;
    }

    public function createService01048(): ValueAssignedToGlobalConstantRule
    {
        return new ValueAssignedToGlobalConstantRule($this->getService('0431'));
    }

    public function createService01049(): ValueAssignedToDefineRule
    {
        return new ValueAssignedToDefineRule($this->getService('0431'));
    }

    public function createService01050(): UnusedMethodParametersRule
    {
        return new UnusedMethodParametersRule($this->getService('068'));
    }

    public function createService01051(): ReplaceCountMismatchRule
    {
        return new ReplaceCountMismatchRule($this->getService('reflectionProvider'), $this->getService('09'));
    }

    public function createService01052(): PrintfParameterTypeRule
    {
        return new PrintfParameterTypeRule(
            $this->getService('0126'),
            $this->getService('reflectionProvider'),
            $this->getService('041'),
            $this->getParameter('checkStrictPrintfPlaceholderTypes')
        );
    }

    public function createService01053(): UnusedFunctionParametersRule
    {
        return new UnusedFunctionParametersRule($this->getService('068'));
    }

    public function createService01054(): ParameterCastableToNumberRule
    {
        return new ParameterCastableToNumberRule(
            $this->getService('reflectionProvider'),
            $this->getService('099'),
            $this->getService('09')
        );
    }

    public function createService01055(): SortWithoutEffectRule
    {
        return new SortWithoutEffectRule(
            $this->getService('reflectionProvider'),
            $this->getParameter('treatPhpDocTypesAsCertain'),
            $this->getParameter('tips')['treatPhpDocTypesAsCertain']
        );
    }

    public function createService01056(): TooWidePropertyHookThrowTypeRule
    {
        return new TooWidePropertyHookThrowTypeRule(
            $this->getService('063'),
            $this->getParameter('checkTooWideThrowTypesInProtectedAndPublicMethods')
        );
    }

    public function createService01057(): TooWideMethodThrowTypeRule
    {
        return new TooWideMethodThrowTypeRule(
            $this->getService('0117'),
            $this->getService('063'),
            $this->getParameter('checkTooWideThrowTypesInProtectedAndPublicMethods'),
            $this->getParameter('exceptions')['check']['tooWideImplicitThrowType']
        );
    }

    public function createService01058(): TooWideFunctionThrowTypeRule
    {
        return new TooWideFunctionThrowTypeRule($this->getService('063'));
    }

    public function createService01059(): UnusedLabelRule
    {
        return new UnusedLabelRule;
    }

    public function createService01060(): UnusedVariableRule
    {
        return new UnusedVariableRule($this->getService('0540'));
    }

    public function createService01061(): NewStaticInAbstractClassStaticMethodRule
    {
        return new NewStaticInAbstractClassStaticMethodRule;
    }

    public function createService01062(): TraitUseCollector
    {
        return new TraitUseCollector;
    }

    public function createService01063(): MethodWithoutImpurePointsCollector
    {
        return new MethodWithoutImpurePointsCollector($this->getService('070'));
    }

    public function createService01064(): ConstructorWithoutImpurePointsCollector
    {
        return new ConstructorWithoutImpurePointsCollector($this->getService('070'));
    }

    public function createService01065(): PossiblyPureStaticCallCollector
    {
        return new PossiblyPureStaticCallCollector;
    }

    public function createService01066(): PossiblyPureMethodCallCollector
    {
        return new PossiblyPureMethodCallCollector;
    }

    public function createService01067(): PossiblyPureFuncCallCollector
    {
        return new PossiblyPureFuncCallCollector($this->getService('reflectionProvider'));
    }

    public function createService01068(): PossiblyPureNewCollector
    {
        return new PossiblyPureNewCollector($this->getService('reflectionProvider'));
    }

    public function createService01069(): FunctionWithoutImpurePointsCollector
    {
        return new FunctionWithoutImpurePointsCollector($this->getService('070'));
    }

    public function createService01070(): BuilderFactory
    {
        return new BuilderFactory;
    }

    public function createService01071(): NameResolver
    {
        return new NameResolver(options: ['preserveOriginalNames' => true]);
    }

    public function createService01072(): ParserConfig
    {
        return new ParserConfig(['lines' => true]);
    }

    public function createService01073(): PHPStan\PhpDocParser\Lexer\Lexer
    {
        return new PHPStan\PhpDocParser\Lexer\Lexer($this->getService('01072'));
    }

    public function createService01074(): TypeParser
    {
        return new TypeParser($this->getService('01072'), $this->getService('01075'));
    }

    public function createService01075(): ConstExprParser
    {
        return new ConstExprParser($this->getService('01072'));
    }

    public function createService01076(): PhpDocParser
    {
        return new PhpDocParser(
            $this->getService('01072'),
            $this->getService('01074'),
            $this->getService('01075')
        );
    }

    public function createService01077(): PHPStan\PhpDocParser\Printer\Printer
    {
        return new PHPStan\PhpDocParser\Printer\Printer;
    }

    public function createService01078(): PhpStormStubsSourceStubber
    {
        return $this->getService('0524')->create();
    }

    public function createService01079(): ReflectionSourceStubber
    {
        return $this->getService('0523')->create();
    }

    public function createService01080(): ReflectionGetAttributesMethodReturnTypeExtension
    {
        return new ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClass');
    }

    public function createService01081(): ReflectionGetAttributesMethodReturnTypeExtension
    {
        return new ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClassConstant');
    }

    public function createService01082(): ReflectionGetAttributesMethodReturnTypeExtension
    {
        return new ReflectionGetAttributesMethodReturnTypeExtension('ReflectionFunctionAbstract');
    }

    public function createService01083(): ReflectionGetAttributesMethodReturnTypeExtension
    {
        return new ReflectionGetAttributesMethodReturnTypeExtension('ReflectionParameter');
    }

    public function createService01084(): ReflectionGetAttributesMethodReturnTypeExtension
    {
        return new ReflectionGetAttributesMethodReturnTypeExtension('ReflectionProperty');
    }

    public function createService01085(): DateTimeModifyReturnTypeExtension
    {
        return new DateTimeModifyReturnTypeExtension('DateTime');
    }

    public function createService01086(): DateTimeModifyReturnTypeExtension
    {
        return new DateTimeModifyReturnTypeExtension('DateTimeImmutable');
    }

    public function createService01087(): NativeReflectionEnumReturnDynamicReturnTypeExtension
    {
        return new NativeReflectionEnumReturnDynamicReturnTypeExtension(
            'PHPStan\Reflection\ClassReflection',
            'getNativeReflection'
        );
    }

    public function createService01088(): NativeReflectionEnumReturnDynamicReturnTypeExtension
    {
        return new NativeReflectionEnumReturnDynamicReturnTypeExtension(
            'PHPStan\Reflection\Php\BuiltinMethodReflection',
            'getDeclaringClass'
        );
    }

    public function createService01089(): AdapterReflectionEnumCaseDynamicReturnTypeExtension
    {
        return new AdapterReflectionEnumCaseDynamicReturnTypeExtension('PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnumBackedCase');
    }

    public function createService01090(): AdapterReflectionEnumCaseDynamicReturnTypeExtension
    {
        return new AdapterReflectionEnumCaseDynamicReturnTypeExtension('PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnumUnitCase');
    }

    public function createService01091(): RestrictedInternalClassConstantUsageExtension
    {
        return new RestrictedInternalClassConstantUsageExtension($this->getService('033'));
    }

    public function createService01092(): RestrictedInternalClassNameUsageExtension
    {
        return new RestrictedInternalClassNameUsageExtension($this->getService('033'));
    }

    public function createService01093(): RestrictedInternalFunctionUsageExtension
    {
        return new RestrictedInternalFunctionUsageExtension($this->getService('033'));
    }

    public function createService01094(): RestrictedInternalPropertyUsageExtension
    {
        return new RestrictedInternalPropertyUsageExtension($this->getService('033'));
    }

    public function createService01095(): RestrictedInternalMethodUsageExtension
    {
        return new RestrictedInternalMethodUsageExtension($this->getService('033'));
    }

    public function createService01096(): ContainerArrayAccessDynamicMethodReturnTypeExtension
    {
        return new ContainerArrayAccessDynamicMethodReturnTypeExtension('Illuminate\Contracts\Container\Container');
    }

    public function createService01097(): ContainerArrayAccessDynamicMethodReturnTypeExtension
    {
        return new ContainerArrayAccessDynamicMethodReturnTypeExtension('Illuminate\Container\Container');
    }

    public function createService01098(): ContainerArrayAccessDynamicMethodReturnTypeExtension
    {
        return new ContainerArrayAccessDynamicMethodReturnTypeExtension('Illuminate\Foundation\Application');
    }

    public function createService01099(): ContainerArrayAccessDynamicMethodReturnTypeExtension
    {
        return new ContainerArrayAccessDynamicMethodReturnTypeExtension('Illuminate\Contracts\Foundation\Application');
    }

    public function createService01100(): AbortIfFunctionTypeSpecifyingExtension
    {
        return new AbortIfFunctionTypeSpecifyingExtension(false, 'abort');
    }

    public function createService01101(): AbortIfFunctionTypeSpecifyingExtension
    {
        return new AbortIfFunctionTypeSpecifyingExtension(true, 'abort');
    }

    public function createService01102(): AbortIfFunctionTypeSpecifyingExtension
    {
        return new AbortIfFunctionTypeSpecifyingExtension(false, 'throw');
    }

    public function createService01103(): AbortIfFunctionTypeSpecifyingExtension
    {
        return new AbortIfFunctionTypeSpecifyingExtension(true, 'throw');
    }

    public function createService01104(): AppEnvironmentReturnTypeExtension
    {
        return new AppEnvironmentReturnTypeExtension('Illuminate\Foundation\Application');
    }

    public function createService01105(): AppEnvironmentReturnTypeExtension
    {
        return new AppEnvironmentReturnTypeExtension('Illuminate\Contracts\Foundation\Application');
    }

    public function createService01106(): CheckDispatchArgumentTypesCompatibleWithClassConstructorRule
    {
        return new CheckDispatchArgumentTypesCompatibleWithClassConstructorRule(
            $this->getService('reflectionProvider'),
            $this->getService('071'),
            'Illuminate\Foundation\Bus\Dispatchable'
        );
    }

    public function createService01107(): CheckDispatchArgumentTypesCompatibleWithClassConstructorRule
    {
        return new CheckDispatchArgumentTypesCompatibleWithClassConstructorRule(
            $this->getService('reflectionProvider'),
            $this->getService('071'),
            'Illuminate\Foundation\Events\Dispatchable'
        );
    }

    public function createService01108(): Filesystem
    {
        return new Filesystem;
    }

    public function createService01109(): MacroExtension
    {
        return new MacroExtension($this->getService('reflectionProvider'), $this->getService('0122'));
    }

    public function createServiceBetterReflectionProvider(): BetterReflectionProvider
    {
        return new BetterReflectionProvider(
            $this->getService('0507'),
            $this->getService('0733'),
            $this->getService('betterReflectionReflector'),
            $this->getService('0117'),
            $this->getService('0513'),
            $this->getService('09'),
            $this->getService('0503'),
            $this->getService('0502'),
            $this->getService('stubPhpDocProvider'),
            $this->getService('0734'),
            $this->getService('relativePathHelper'),
            $this->getService('0588'),
            $this->getService('0343'),
            $this->getService('0347'),
            $this->getService('01078'),
            $this->getService('0514'),
            $this->getParameter('universalObjectCratesClasses'),
            $this->getService('0487')
        );
    }

    public function createServiceBetterReflectionReflector(): Reflector
    {
        return new MemoizingReflector($this->getService('betterReflectionSourceLocator'));
    }

    public function createServiceBetterReflectionSourceLocator(): SourceLocator
    {
        return $this->getService('0535')->create();
    }

    public function createServiceCacheStorage(): FileCacheStorage
    {
        return new FileCacheStorage('C:\laragon\www\work\panda\tmp\phpstan/cache/PHPStan');
    }

    public function createServiceCachedPhp8Parser(): CachedParser
    {
        return new CachedParser($this->getService('php8Parser'), 256, 4194304);
    }

    public function createServiceCachedRichParser(): CachedParser
    {
        return new CachedParser($this->getService('currentPhpVersionRichParser'), 256, 4194304);
    }

    public function createServiceCachedSimpleParser(): CachedParser
    {
        return new CachedParser($this->getService('currentPhpVersionSimpleParser'), 256, 4194304);
    }

    public function createServiceContainer(): Container_98276e52e6
    {
        return $this;
    }

    public function createServiceCurrentPhpVersionLexer(): Lexer
    {
        return $this->getService('0566')->create();
    }

    public function createServiceCurrentPhpVersionPhpParser(): ParserAbstract
    {
        return $this->getService('currentPhpVersionPhpParserFactory')->create();
    }

    public function createServiceCurrentPhpVersionPhpParserFactory(): PhpParserFactory
    {
        return new PhpParserFactory($this->getService('currentPhpVersionLexer'), $this->getService('09'));
    }

    public function createServiceCurrentPhpVersionRichParser(): RichParser
    {
        return new RichParser(
            $this->getService('currentPhpVersionPhpParser'),
            $this->getService('01071'),
            $this->getService('phpstan.extensionsCollection.PhpParser.NodeVisitor'),
            $this->getService('0489')
        );
    }

    public function createServiceCurrentPhpVersionSimpleDirectParser(): SimpleParser
    {
        return new SimpleParser($this->getService('currentPhpVersionPhpParser'), $this->getService('01071'));
    }

    public function createServiceCurrentPhpVersionSimpleParser(): CleaningParser
    {
        return new CleaningParser($this->getService('currentPhpVersionSimpleDirectParser'), $this->getService('09'));
    }

    public function createServiceDefaultAnalysisParser(): PathRoutingParser
    {
        return $this->getService('pathRoutingParser');
    }

    public function createServiceErrorFormatter__checkstyle(): CheckstyleErrorFormatter
    {
        return new CheckstyleErrorFormatter($this->getService('simpleRelativePathHelper'));
    }

    public function createServiceErrorFormatter__github(): GithubErrorFormatter
    {
        return new GithubErrorFormatter($this->getService('simpleRelativePathHelper'));
    }

    public function createServiceErrorFormatter__gitlab(): GitlabErrorFormatter
    {
        return new GitlabErrorFormatter($this->getService('simpleRelativePathHelper'));
    }

    public function createServiceErrorFormatter__json(): JsonErrorFormatter
    {
        return new JsonErrorFormatter(false);
    }

    public function createServiceErrorFormatter__junit(): JunitErrorFormatter
    {
        return new JunitErrorFormatter($this->getService('simpleRelativePathHelper'));
    }

    public function createServiceErrorFormatter__prettyJson(): JsonErrorFormatter
    {
        return new JsonErrorFormatter(true);
    }

    public function createServiceErrorFormatter__raw(): RawErrorFormatter
    {
        return new RawErrorFormatter;
    }

    public function createServiceErrorFormatter__table(): TableErrorFormatter
    {
        return new TableErrorFormatter(
            $this->getService('relativePathHelper'),
            $this->getService('simpleRelativePathHelper'),
            $this->getService('0107'),
            $this->getParameter('tipsOfTheDay'),
            $this->getParameter('editorUrl'),
            $this->getParameter('editorUrlTitle'),
            $this->getParameter('usedLevel')
        );
    }

    public function createServiceErrorFormatter__teamcity(): TeamcityErrorFormatter
    {
        return new TeamcityErrorFormatter($this->getService('simpleRelativePathHelper'));
    }

    public function createServiceExceptionTypeResolver(): ExceptionTypeResolver
    {
        return $this->getService('064');
    }

    public function createServiceFileExcluderAnalyse(): FileExcluder
    {
        return $this->getService('0349')->createAnalyseFileExcluder();
    }

    public function createServiceFileExcluderScan(): FileExcluder
    {
        return $this->getService('0349')->createScanFileExcluder();
    }

    public function createServiceFileFinderAnalyse(): FileFinder
    {
        return new FileFinder(
            $this->getService('fileExcluderAnalyse'),
            $this->getService('0343'),
            ['php'],
            $this->getService('0344')
        );
    }

    public function createServiceFileFinderScan(): FileFinder
    {
        return new FileFinder(
            $this->getService('fileExcluderScan'),
            $this->getService('0343'),
            ['php'],
            $this->getService('0344')
        );
    }

    public function createServiceFreshStubParser(): StubParser
    {
        return new StubParser($this->getService('php8PhpParser'), $this->getService('01071'));
    }

    public function createServiceIamcalSqlParser(): IamcalSqlParser
    {
        return new IamcalSqlParser;
    }

    public function createServiceMigrationsParser(): CachedParser
    {
        return new CachedParser($this->getService('currentPhpVersionSimpleDirectParser'), 256);
    }

    public function createServiceParentDirectoryRelativePathHelper(): ParentDirectoryRelativePathHelper
    {
        return new ParentDirectoryRelativePathHelper($this->getParameter('currentWorkingDirectory'));
    }

    public function createServicePathRoutingParser(): PathRoutingParser
    {
        return new PathRoutingParser(
            $this->getService('0343'),
            $this->getService('cachedRichParser'),
            $this->getService('cachedSimpleParser'),
            $this->getService('cachedPhp8Parser'),
            $this->getParameter('singleReflectionFile')
        );
    }

    public function createServicePhp8Lexer(): Emulative
    {
        return $this->getService('0566')->createEmulative();
    }

    public function createServicePhp8Parser(): SimpleParser
    {
        return new SimpleParser($this->getService('php8PhpParser'), $this->getService('01071'));
    }

    public function createServicePhp8PhpParser(): Php8
    {
        return new Php8($this->getService('php8Lexer'));
    }

    public function createServicePhpParserDecorator(): PhpParserDecorator
    {
        return new PhpParserDecorator($this->getService('defaultAnalysisParser'));
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__ExprHandler(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.exprHandler');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__IgnoreErrorExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.ignoreErrorExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__PerFileAnalysisResettable(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.perFileAnalysisResettable');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__ResultCache__ResultCacheMetaExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.resultCacheMetaExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__ResultCache__ResultCacheValueExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.resultCacheValueExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Analyser__StmtHandler(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.stmtHandler');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Classes__ForbiddenClassNameExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.forbiddenClassNamesExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Collectors__Collector(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.collector');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Diagnose__DiagnoseExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.diagnoseExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__PhpDoc__StubFilesExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.stubFilesExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__PhpDoc__TypeNodeResolverExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.phpDoc.typeNodeResolverExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__AdditionalConstructorsExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.additionalConstructorsExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__AllowedSubTypesClassReflectionExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.allowedSubTypesClassReflectionExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__ClassConstantDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.classConstantDeprecationExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__ClassDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.classDeprecationExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__ConstantDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.constantDeprecationExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__EnumCaseDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.enumCaseDeprecationExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__FunctionDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.functionDeprecationExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__MethodDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.methodDeprecationExtension');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__Deprecation__PropertyDeprecationExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.propertyDeprecationExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__MethodsClassReflectionExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.methodsClassReflectionExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Reflection__PropertiesClassReflectionExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.propertiesClassReflectionExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__Constants__AlwaysUsedClassConstantsExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.constants.alwaysUsedClassConstantsExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__Methods__AlwaysUsedMethodExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.methods.alwaysUsedMethodExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__Properties__ReadWritePropertiesExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.properties.readWriteExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__RestrictedUsage__RestrictedClassConstantUsageExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.restrictedClassConstantUsageExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__RestrictedUsage__RestrictedClassNameUsageExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.restrictedClassNameUsageExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__RestrictedUsage__RestrictedFunctionUsageExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.restrictedFunctionUsageExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__RestrictedUsage__RestrictedMethodUsageExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.restrictedMethodUsageExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__RestrictedUsage__RestrictedPropertyUsageExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.restrictedPropertyUsageExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Rules__Rule(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection($this->getService('012'), 'phpstan.rules.rule');
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicFunctionReturnTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.dynamicFunctionReturnTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicFunctionThrowTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.dynamicFunctionThrowTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicMethodReturnTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.dynamicMethodReturnTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicMethodThrowTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.dynamicMethodThrowTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicStaticMethodReturnTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.dynamicStaticMethodReturnTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__DynamicStaticMethodThrowTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.dynamicStaticMethodThrowTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__ExpressionTypeResolverExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.expressionTypeResolverExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__FunctionParameterClosureThisExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.functionParameterClosureThisExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__FunctionParameterClosureTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.functionParameterClosureTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__FunctionParameterOutTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.functionParameterOutTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__FunctionTypeSpecifyingExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.typeSpecifier.functionTypeSpecifyingExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__MethodParameterClosureThisExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.methodParameterClosureThisExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__MethodParameterClosureTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.methodParameterClosureTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__MethodParameterOutTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.methodParameterOutTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__MethodTypeSpecifyingExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.typeSpecifier.methodTypeSpecifyingExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__OperatorTypeSpecifyingExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.operatorTypeSpecifyingExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__StaticMethodParameterClosureThisExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.staticMethodParameterClosureThisExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__StaticMethodParameterClosureTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.staticMethodParameterClosureTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__StaticMethodParameterOutTypeExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.staticMethodParameterOutTypeExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__StaticMethodTypeSpecifyingExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.typeSpecifier.staticMethodTypeSpecifyingExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PHPStan__Type__UnaryOperatorTypeSpecifyingExtension(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.broker.unaryOperatorTypeSpecifyingExtension'
        );
    }

    public function createServicePhpstan__extensionsCollection__PhpParser__NodeVisitor(): LazyExtensionsCollection
    {
        return new LazyExtensionsCollection(
            $this->getService('012'),
            'phpstan.parser.richParserNodeVisitor'
        );
    }

    public function createServicePhpstanDiagnoseExtension(): PHPStanDiagnoseExtension
    {
        return new PHPStanDiagnoseExtension(
            $this->getService('09'),
            $this->getParameter('phpVersion'),
            $this->getService('0343'),
            $this->getParameter('composerAutoloaderProjectPaths'),
            $this->getParameter('allConfigFiles'),
            $this->getService('06'),
            $this->getService('simpleRelativePathHelper')
        );
    }

    public function createServiceReflectionProvider(): ReflectionProvider
    {
        return $this->getService('reflectionProviderFactory')->create();
    }

    public function createServiceReflectionProviderFactory(): ReflectionProviderFactory
    {
        return new ReflectionProviderFactory(
            $this->getService('betterReflectionProvider'),
            $this->getService('0487')
        );
    }

    public function createServiceRegistry(): PHPStan\Rules\Registry
    {
        return new LazyRegistry($this->getService('phpstan.extensionsCollection.PHPStan.Rules.Rule'));
    }

    public function createServiceRelativePathHelper(): RelativePathHelper
    {
        return new FuzzyRelativePathHelper(
            $this->getService('parentDirectoryRelativePathHelper'),
            $this->getParameter('currentWorkingDirectory'),
            $this->getParameter('analysedPaths')
        );
    }

    public function createServiceSimpleRelativePathHelper(): SimpleRelativePathHelper
    {
        return new SimpleRelativePathHelper($this->getParameter('currentWorkingDirectory'));
    }

    public function createServiceSqlParser(): SqlParser
    {
        return $this->getService('sqlParserFactory')->create();
    }

    public function createServiceSqlParserFactory(): SqlParserFactory
    {
        return new SqlParserFactory($this->getService('iamcalSqlParser'));
    }

    public function createServiceStubFileTypeMapper(): FileTypeMapper
    {
        return new FileTypeMapper(
            $this->getService('0516'),
            $this->getService('stubParser'),
            $this->getService('0547'),
            $this->getService('0546'),
            $this->getService('0588'),
            $this->getService('0343'),
            $this->getService('015'),
            $this->getService('0346'),
            2048,
            512
        );
    }

    public function createServiceStubParser(): CachedParser
    {
        return new CachedParser($this->getService('freshStubParser'), 256, 4194304);
    }

    public function createServiceStubPhpDocProvider(): StubPhpDocProvider
    {
        return new StubPhpDocProvider(
            $this->getService('stubParser'),
            $this->getService('stubFileTypeMapper'),
            $this->getService('0543')
        );
    }

    public function createServiceTypeSpecifier(): TypeSpecifier
    {
        return $this->getService('typeSpecifierFactory')->create();
    }

    public function createServiceTypeSpecifierFactory(): TypeSpecifierFactory
    {
        return new TypeSpecifierFactory($this->getService('012'));
    }

    public function initialize(): void {}

    protected function getStaticParameters(): array
    {
        return [
            'bootstrapFiles' => [
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\runtime\ReflectionUnionType.php',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\runtime\ReflectionAttribute.php',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\runtime\Attribute85.php',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\runtime\ReflectionIntersectionType.php',
                'C:\laragon\www\work\panda\vendor\larastan\larastan\bootstrap.php',
                'C:\laragon\www\work\panda\vendor\nesbot\carbon\lazy\Carbon\UnprotectedDatePeriod.php',
            ],
            'excludePaths' => ['analyseAndScan' => [], 'analyse' => []],
            'level' => 'max',
            'paths' => [
                'C:\laragon\www\work\panda\app',
                'C:\laragon\www\work\panda\bootstrap\app.php',
                'C:\laragon\www\work\panda\config',
                'C:\laragon\www\work\panda\database',
                'C:\laragon\www\work\panda\routes',
            ],
            'exceptions' => [
                'implicitThrows' => true,
                'reportUncheckedExceptionDeadCatch' => true,
                'uncheckedExceptionRegexes' => [],
                'uncheckedExceptionClasses' => ['Error'],
                'checkedExceptionRegexes' => [],
                'checkedExceptionClasses' => [],
                'check' => [
                    'missingCheckedExceptionInThrows' => false,
                    'tooWideThrowType' => true,
                    'tooWideImplicitThrowType' => false,
                    'throwTypeCovariance' => false,
                ],
            ],
            'featureToggles' => [
                'bleedingEdge' => true,
                'checkNonStringableDynamicAccess' => true,
                'checkParameterCastableToNumberFunctions' => true,
                'skipCheckGenericClasses' => [],
                'stricterFunctionMap' => true,
                'reportPreciseLineForUnusedFunctionParameter' => true,
                'checkPrintfParameterTypes' => true,
                'internalTag' => true,
                'newStaticInAbstractClassStaticMethod' => true,
                'checkExtensionsForComparisonOperators' => true,
                'checkGenericIterableClasses' => true,
                'reportTooWideBool' => true,
                'rawMessageInBaseline' => true,
                'reportNestedTooWideType' => false,
                'assignToByRefForeachExpr' => true,
                'curlSetOptArrayTypes' => true,
                'magicDirInInclude' => true,
                'checkDateIntervalConstructor' => true,
                'reportMethodPurityOverride' => true,
                'checkDynamicConstantNameValues' => true,
                'unusedLabel' => true,
                'newOnNonObject' => true,
                'unnecessaryNullCoalesce' => true,
                'finiteTypesInHaystack' => true,
                'switchConditionAlwaysFalse' => true,
                'checkImportedClassNameCase' => true,
                'sortWithoutEffect' => true,
                'unresolvedTemplateArguments' => true,
                'closureSignaturesFromUsages' => true,
                'staticVariablesFromUsages' => true,
                'backedEnumFromParameterType' => true,
                'unusedVariable' => true,
                'unusedParameters' => true,
                'reuseCollectedDataRuleErrors' => true,
                'checkWholePhpVersionRange' => true,
                'replaceCountMismatch' => true,
            ],
            'fileExtensions' => ['php'],
            'checkAdvancedIsset' => true,
            'reportAlwaysTrueInLastCondition' => false,
            'checkClassCaseSensitivity' => true,
            'checkExplicitMixed' => true,
            'checkImplicitMixed' => true,
            'checkFunctionArgumentTypes' => true,
            'checkFunctionNameCase' => false,
            'checkInternalClassCaseSensitivity' => false,
            'checkMissingCallableSignature' => false,
            'checkMissingVarTagTypehint' => true,
            'checkArgumentsPassedByReference' => true,
            'checkMaybeUndefinedVariables' => true,
            'checkNullables' => true,
            'checkThisOnly' => false,
            'checkUnionTypes' => true,
            'checkBenevolentUnionTypes' => false,
            'checkExplicitMixedMissingReturn' => false,
            'checkPhpDocMissingReturn' => true,
            'checkPhpDocMethodSignatures' => true,
            'checkExtraArguments' => true,
            'checkMissingTypehints' => true,
            'checkTooWideParameterOutInProtectedAndPublicMethods' => false,
            'checkTooWideReturnTypesInProtectedAndPublicMethods' => false,
            'checkTooWideThrowTypesInProtectedAndPublicMethods' => false,
            'checkUninitializedProperties' => false,
            'checkDynamicProperties' => false,
            'strictRulesInstalled' => false,
            'deprecationRulesInstalled' => false,
            'inferPrivatePropertyTypeFromConstructor' => false,
            'checkStrictPrintfPlaceholderTypes' => false,
            'reportMaybes' => true,
            'reportMaybesInMethodSignatures' => false,
            'reportMaybesInPropertyPhpDocTypes' => false,
            'reportStaticMethodSignatures' => false,
            'reportWrongPhpDocTypeInVarTag' => false,
            'reportAnyTypeWideningInVarTag' => false,
            'reportNonIntStringArrayKey' => false,
            'reportUnsafeArrayStringKeyCasting' => null,
            'reportPossiblyNonexistentGeneralArrayOffset' => false,
            'reportPossiblyNonexistentConstantArrayOffset' => false,
            'checkMissingOverrideMethodAttribute' => false,
            'checkMissingOverridePropertyAttribute' => null,
            'checkMissingOverrideConstantAttribute' => null,
            'mixinExcludeClasses' => ['Eloquent'],
            'scanFiles' => [],
            'scanDirectories' => [],
            'parallel' => [
                'jobSize' => 20,
                'processTimeout' => 600.0,
                'maximumNumberOfProcesses' => 'auto',
                'minimumNumberOfJobsPerProcess' => 2,
                'buffer' => 134217728,
                'loadLimit' => 1.0,
            ],
            'phpVersion' => null,
            'polluteScopeWithLoopInitialAssignments' => true,
            'polluteScopeWithAlwaysIterableForeach' => true,
            'polluteScopeWithBlock' => true,
            'propertyAlwaysWrittenTags' => [],
            'propertyAlwaysReadTags' => [],
            'additionalConstructors' => [],
            'treatPhpDocTypesAsCertain' => true,
            'usePathConstantsAsConstantString' => false,
            'rememberPossiblyImpureFunctionValues' => true,
            'tips' => ['discoveringSymbols' => true, 'treatPhpDocTypesAsCertain' => true, 'possiblyImpure' => true],
            'tipsOfTheDay' => true,
            'reportMagicMethods' => true,
            'reportMagicProperties' => true,
            'ignoreErrors' => [],
            'internalErrorsCountLimit' => 50,
            'cache' => [
                'nodesByStringCountMax' => 256,
                'nodesByStringSourceBytesMax' => 4194304,
                'resolvedPhpDocBlockCacheCountMax' => 2048,
                'nameScopeMapMemoryCacheCountMax' => 512,
                'phpStormStubsNodesCountMax' => 128,
                'memberCacheKeysMax' => 2048,
                'resolvedLocalTypeAliasesCountMax' => 2048,
            ],
            'reportUnmatchedIgnoredErrors' => true,
            'reportIgnoresWithoutComments' => false,
            'typeAliases' => [],
            'universalObjectCratesClasses' => ['stdClass', 'Illuminate\Http\Request', 'Illuminate\Support\Optional'],
            'stubFiles' => [
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\Memcached.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\Redis.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionAttribute.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionClassConstant.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionFunctionAbstract.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionMethod.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionParameter.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionProperty.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ReflectionType.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\iterable.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ArrayObject.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\WeakReference.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\SensitiveParameterValue.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ImagickPixel.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\PDOStatement.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\date.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ibm_db2.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\mysqli.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\zip.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\dom.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\spl.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\SplObjectStorage.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\Exception.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\arrayFunctions.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\core.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\typeCheckingFunctions.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\Countable.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\file.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\stream_socket_client.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\stream_socket_server.stub',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\stubs\ctype.stub',
            ],
            'earlyTerminatingMethodCalls' => [],
            'earlyTerminatingFunctionCalls' => ['abort', 'dd'],
            'resultCachePath' => 'C:\laragon\www\work\panda\tmp\phpstan/resultCache.php',
            'resultCacheSkipIfOlderThanDays' => 7,
            'resultCacheChecksProjectExtensionFilesDependencies' => false,
            'dynamicConstantNames' => [
                'ICONV_IMPL',
                'LIBXML_VERSION',
                'LIBXML_DOTTED_VERSION',
                'Memcached::HAVE_ENCODING',
                'Memcached::HAVE_IGBINARY',
                'Memcached::HAVE_JSON',
                'Memcached::HAVE_MSGPACK',
                'Memcached::HAVE_SASL',
                'Memcached::HAVE_SESSION',
                'PHP_VERSION',
                'PHP_MAJOR_VERSION',
                'PHP_MINOR_VERSION',
                'PHP_RELEASE_VERSION',
                'PHP_VERSION_ID',
                'PHP_EXTRA_VERSION',
                'PHP_WINDOWS_VERSION_MAJOR',
                'PHP_WINDOWS_VERSION_MINOR',
                'PHP_WINDOWS_VERSION_BUILD',
                'PHP_ZTS',
                'PHP_DEBUG',
                'PHP_MAXPATHLEN',
                'PHP_OS',
                'PHP_OS_FAMILY',
                'PHP_SAPI',
                'PHP_EOL',
                'PHP_INT_MAX',
                'PHP_INT_MIN',
                'PHP_INT_SIZE',
                'PHP_FLOAT_DIG',
                'PHP_FLOAT_EPSILON',
                'PHP_FLOAT_MIN',
                'PHP_FLOAT_MAX',
                'DEFAULT_INCLUDE_PATH',
                'PEAR_INSTALL_DIR',
                'PEAR_EXTENSION_DIR',
                'PHP_EXTENSION_DIR',
                'PHP_PREFIX',
                'PHP_BINDIR',
                'PHP_BINARY',
                'PHP_MANDIR',
                'PHP_LIBDIR',
                'PHP_DATADIR',
                'PHP_SYSCONFDIR',
                'PHP_LOCALSTATEDIR',
                'PHP_CONFIG_FILE_PATH',
                'PHP_CONFIG_FILE_SCAN_DIR',
                'PHP_SHLIB_SUFFIX',
                'PHP_FD_SETSIZE',
                'OPENSSL_VERSION_NUMBER',
                'ZEND_DEBUG_BUILD',
                'ZEND_THREAD_SAFE',
                'E_ALL',
            ],
            'customRulesetUsed' => false,
            'editorUrl' => null,
            'editorUrlTitle' => null,
            'errorFormat' => null,
            'sourceLocatorPlaygroundMode' => false,
            'fixer' => ['importNames' => true, 'preferSelf' => false],
            '__validate' => true,
            'parametersNotInvalidatingCache' => [
                ['parameters', 'editorUrl'],
                ['parameters', 'editorUrlTitle'],
                ['parameters', 'errorFormat'],
                ['parameters', 'ignoreErrors'],
                ['parameters', 'reportUnmatchedIgnoredErrors'],
                ['parameters', 'tipsOfTheDay'],
                ['parameters', 'parallel'],
                ['parameters', 'internalErrorsCountLimit'],
                ['parameters', 'cache'],
                ['parameters', 'memoryLimitFile'],
                ['parameters', 'tmpDir'],
                ['parameters', 'pro'],
                'parametersSchema',
            ],
            'checkOctaneCompatibility' => false,
            'noEnvCallsOutsideOfConfig' => true,
            'noModelMake' => true,
            'noImplicitQueryBuilderCall' => false,
            'noUnnecessaryCollectionCall' => true,
            'noUnnecessaryCollectionCallOnly' => [],
            'noUnnecessaryCollectionCallExcept' => [],
            'noUnnecessaryEnumerableToArrayCalls' => false,
            'squashedMigrationsPath' => [],
            'databaseMigrationsPath' => [],
            'disableMigrationScan' => false,
            'disableSchemaScan' => false,
            'configDirectories' => [],
            'viewDirectories' => [],
            'translationDirectories' => [],
            'checkModelProperties' => false,
            'checkUnusedViews' => false,
            'checkMissingTranslations' => false,
            'checkModelAppends' => true,
            'checkModelMethodVisibility' => false,
            'generalizeEnvReturnType' => false,
            'checkConfigTypes' => false,
            'checkAuthCallsWhenInRequestScope' => false,
            'parseModelCastsMethod' => false,
            'pivotTypesInCollections' => false,
            'enableMigrationCache' => true,
            'checkUniqueJobUniqueFor' => false,
            'checkUniqueJobUniqueId' => false,
            'noBatchedUniqueJob' => false,
            'checkJobSerializesModels' => false,
            'checkBatchedJobIsBatchable' => false,
            'checkBatchableJobChecksCancellation' => false,
            'checkDispatchInTransactionAfterCommit' => false,
            'redisDriver' => null,
            'tmpDir' => 'C:\laragon\www\work\panda\tmp\phpstan',
            'debugMode' => true,
            'productionMode' => false,
            'tempDir' => 'C:\laragon\www\work\panda\tmp\phpstan',
            'rootDir' => 'C:\laragon\www\work\panda\vendor\phpstan\phpstan',
            'currentWorkingDirectory' => 'C:\laragon\www\work\panda',
            'cliArgumentsVariablesRegistered' => false,
            'additionalConfigFiles' => [
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar/conf/config.levelmax.neon',
                'C:\laragon\www\work\panda\phpstan.neon',
            ],
            'allConfigFiles' => [
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\parametersSchema.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.levelmax.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level10.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level9.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level8.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level7.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level6.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level5.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level4.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level3.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level2.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level1.neon',
                'phar://C:\laragon\www\work\panda\vendor\phpstan\phpstan\phpstan.phar\conf\config.level0.neon',
                'C:\laragon\www\work\panda\phpstan.neon',
                'C:\laragon\www\work\panda\vendor\larastan\larastan\extension.neon',
                'C:\laragon\www\work\panda\vendor\nesbot\carbon\extension.neon',
                'phar://phpstan.phar\conf\bleedingEdge.neon',
            ],
            'composerAutoloaderProjectPaths' => ['C:/laragon/www/work/panda'],
            'generateBaselineFile' => null,
            'usedLevel' => 'max',
            'cliAutoloadFile' => null,
            'attributeServicesDirectories' => ['C:/laragon/www/work/panda/vendor/larastan/larastan/src'],
            'attributeServicesClasses' => [
                'Larastan\Larastan\ClosureTypes\RelationshipQueryCallbackExtension',
                'Larastan\Larastan\Collectors\UsedEmailAlternativeSyntaxViewCollector',
                'Larastan\Larastan\Collectors\UsedEmailSendViewCollector',
                'Larastan\Larastan\Collectors\UsedEmailViewCollector',
                'Larastan\Larastan\Collectors\UsedRouteFacadeViewCollector',
                'Larastan\Larastan\Collectors\UsedTranslationFacadeCollector',
                'Larastan\Larastan\Collectors\UsedTranslationFunctionCollector',
                'Larastan\Larastan\Collectors\UsedTranslationTranslatorCollector',
                'Larastan\Larastan\Collectors\UsedTranslationViewCollector',
                'Larastan\Larastan\Collectors\UsedViewFacadeMakeCollector',
                'Larastan\Larastan\Collectors\UsedViewFunctionCollector',
                'Larastan\Larastan\Collectors\UsedViewInAnotherViewCollector',
                'Larastan\Larastan\Collectors\UsedViewMakeCollector',
                'Larastan\Larastan\Internal\ConfigHelper',
                'Larastan\Larastan\Internal\ConsoleApplicationHelper',
                'Larastan\Larastan\Internal\ConsoleApplicationResolver',
                'Larastan\Larastan\LarastanStubFilesExtension',
                'Larastan\Larastan\Methods\AuthsMethodsExtension',
                'Larastan\Larastan\Methods\BuilderHelper',
                'Larastan\Larastan\Methods\ContractsMethodsExtension',
                'Larastan\Larastan\Methods\EloquentBuilderForwardsCallsExtension',
                'Larastan\Larastan\Methods\FacadesMethodsExtension',
                'Larastan\Larastan\Methods\HigherOrderCollectionProxyExtension',
                'Larastan\Larastan\Methods\HigherOrderTapProxyExtension',
                'Larastan\Larastan\Methods\MacroMethodsClassReflectionExtension',
                'Larastan\Larastan\Methods\ManagersMethodsExtension',
                'Larastan\Larastan\Methods\ModelFactoryMethodsClassReflectionExtension',
                'Larastan\Larastan\Methods\ModelForwardsCallsExtension',
                'Larastan\Larastan\Methods\RedirectResponseMethodsClassReflectionExtension',
                'Larastan\Larastan\Methods\RelationForwardsCallsExtension',
                'Larastan\Larastan\Methods\StorageMethodsClassReflectionExtension',
                'Larastan\Larastan\Methods\ViewWithMethodsClassReflectionExtension',
                'Larastan\Larastan\Properties\HigherOrderCollectionProxyPropertyExtension',
                'Larastan\Larastan\Properties\MigrationCache',
                'Larastan\Larastan\Properties\MigrationHelper',
                'Larastan\Larastan\Properties\ModelAccessorExtension',
                'Larastan\Larastan\Properties\ModelCastHelper',
                'Larastan\Larastan\Properties\ModelPropertyExtension',
                'Larastan\Larastan\Properties\ModelPropertyHelper',
                'Larastan\Larastan\Properties\ModelRelationsExtension',
                'Larastan\Larastan\Properties\Schema\MySqlDataTypeToPhpTypeConverter',
                'Larastan\Larastan\Properties\SquashedMigrationHelper',
                'Larastan\Larastan\ReturnTypes\AppFacadeEnvironmentReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\AppMakeDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\AppMakeHelper',
                'Larastan\Larastan\ReturnTypes\ApplicationMakeDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ArrGetDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\AuthExtension',
                'Larastan\Larastan\ReturnTypes\AuthManagerExtension',
                'Larastan\Larastan\ReturnTypes\CollectionFilterRejectDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\CollectionWhereNotNullDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ConsoleCommand\ArgumentDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ConsoleCommand\HasArgumentDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ConsoleCommand\HasOptionDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ConsoleCommand\OptionDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ContainerMakeDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\DateExtension',
                'Larastan\Larastan\ReturnTypes\DoubleUnderscoreHelperReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\EloquentBuilderExtension',
                'Larastan\Larastan\ReturnTypes\EloquentCollectionMapDynamicReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\FactoryDynamicMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\FormRequestSafeDynamicMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\GuardDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\GuardExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\AppExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\AuthExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\CollectExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\LiteralExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\NowAndTodayExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\ResponseExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\StrExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\TapExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\ValidatorExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\ValueExtension',
                'Larastan\Larastan\ReturnTypes\HigherOrderTapProxyExtension',
                'Larastan\Larastan\ReturnTypes\LangGetReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ModelDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ModelFactoryDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ModelOnlyDynamicMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ModelSerializationDynamicMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\RelationCollectionExtension',
                'Larastan\Larastan\ReturnTypes\RequestFileExtension',
                'Larastan\Larastan\ReturnTypes\RequestRouteExtension',
                'Larastan\Larastan\ReturnTypes\RequestUserExtension',
                'Larastan\Larastan\ReturnTypes\StorageDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\TestCaseExtension',
                'Larastan\Larastan\ReturnTypes\TransHelperReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\TranslatorGetReturnTypeExtension',
                'Larastan\Larastan\Rules\ArrKeyExistenceRule',
                'Larastan\Larastan\Rules\ConsoleCommand\UndefinedArgumentOrOptionRule',
                'Larastan\Larastan\Rules\DeferrableServiceProviderMissingProvidesRule',
                'Larastan\Larastan\Rules\ModelRelationDefaultsRule',
                'Larastan\Larastan\Rules\ModelRuleHelper',
                'Larastan\Larastan\Rules\RelationExistenceHelper',
                'Larastan\Larastan\Rules\RelationExistenceRule',
                'Larastan\Larastan\Rules\UselessConstructs\NoUselessValueFunctionCallsRule',
                'Larastan\Larastan\Rules\UselessConstructs\NoUselessWithFunctionCallsRule',
                'Larastan\Larastan\SQL\SqlParser',
                'Larastan\Larastan\SQL\SqlParserFactory',
                'Larastan\Larastan\Support\CallArgumentsHelper',
                'Larastan\Larastan\Support\CollectionHelper',
                'Larastan\Larastan\Support\ConfigParser',
                'Larastan\Larastan\Support\HigherOrderCollectionProxyHelper',
                'Larastan\Larastan\Support\ViewFileHelper',
                'Larastan\Larastan\Support\ViewParser',
                'Larastan\Larastan\Types\ArrPullParameterOutTypeExtension',
                'Larastan\Larastan\Types\BuilderOf\BuilderOfTypeNodeResolverExtension',
                'Larastan\Larastan\Types\CollectionOf\CollectionOfTypeNodeResolverExtension',
                'Larastan\Larastan\Types\GenericEloquentBuilderTypeNodeResolverExtension',
                'Larastan\Larastan\Types\GenericEloquentCollectionTypeNodeResolverExtension',
                'Larastan\Larastan\Types\ModelProperty\ModelPropertyTypeNodeResolverExtension',
                'Larastan\Larastan\Types\RelationOf\RelationOfTypeNodeResolverExtension',
                'Larastan\Larastan\Types\ViewStringTypeNodeResolverExtension',
                'Larastan\Larastan\ReturnTypes\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\ConfigRepositoryDynamicMethodReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\ConfigFunctionDynamicFunctionReturnTypeExtension',
                'Larastan\Larastan\ReturnTypes\Helpers\EnvFunctionDynamicFunctionReturnTypeExtension',
                'Larastan\Larastan\Rules\ConfigCollectionRule',
                'Larastan\Larastan\Rules\ModelAppendsRule',
                'Larastan\Larastan\Rules\NoAuthFacadeInRequestScopeRule',
                'Larastan\Larastan\Rules\NoAuthHelperInRequestScopeRule',
                'Larastan\Larastan\Rules\NoEnvCallsOutsideOfConfigRule',
                'Larastan\Larastan\Rules\NoImplicitQueryBuilderCallRule',
                'Larastan\Larastan\Rules\NoMissingTranslationsRule',
                'Larastan\Larastan\Rules\NoModelMakeRule',
                'Larastan\Larastan\Rules\NoPublicModelScopeAndAccessorRule',
                'Larastan\Larastan\Rules\NoUnnecessaryCollectionCallRule',
                'Larastan\Larastan\Rules\NoUnnecessaryEnumerableToArrayCallsRule',
                'Larastan\Larastan\Rules\OctaneCompatibilityRule',
                'Larastan\Larastan\Rules\Queue\BatchableJobChecksCancellationRule',
                'Larastan\Larastan\Rules\Queue\BatchedJobIsBatchableRule',
                'Larastan\Larastan\Rules\Queue\JobDispatchedInTransactionUsesAfterCommitRule',
                'Larastan\Larastan\Rules\Queue\JobWithModelPropertyDeclaresSerializesModelsRule',
                'Larastan\Larastan\Rules\Queue\NoBatchedUniqueJobRule',
                'Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueForRule',
                'Larastan\Larastan\Rules\Queue\UniqueJobDeclaresUniqueIdRule',
                'Larastan\Larastan\Rules\UnusedViewsRule',
                'Larastan\Larastan\SQL\IamcalSqlParser',
            ],
            'env' => [
                'ALLUSERSPROFILE' => 'C:\ProgramData',
                'ANTIGRAVITY_AGENT' => '1',
                'ANTIGRAVITY_AGENTAPI_EXE' => 'C:\Users\ao\AppData\Local\Programs\Antigravity\resources\bin\language_server.exe',
                'ANTIGRAVITY_APP_DATA_DIR' => 'C:/Users/ao/.gemini/antigravity',
                'ANTIGRAVITY_CONVERSATION_ID' => '2739f952-53e2-4f86-bec7-418ad1df3355',
                'ANTIGRAVITY_CSRF_TOKEN' => '2360adb3-5451-4bc3-9eee-077cedc4969a',
                'ANTIGRAVITY_LS_ADDRESS' => 'localhost:52285',
                'ANTIGRAVITY_LS_VERSION' => 'hub-2.33.0',
                'ANTIGRAVITY_PROJECT_ID' => '491234fb-f0bb-4685-b013-a79bea996739',
                'ANTIGRAVITY_SOURCE_METADATA' => '{"tool":{"conversationId":"2739f952-53e2-4f86-bec7-418ad1df3355","stepIndex":97,"toolCall":{"id":"call_18246754901807991764","name":"run_command","argumentsJson":"{\"CommandLine\":\"vendor/bin/phpstan analyse --no-progress\",\"WaitMsBeforeAsync\":10000,\"toolSummary\":\"Run PHPStan to list all errors\"}"}}}',
                'ANTIGRAVITY_TRAJECTORY_ID' => '241927f2-50ef-4f6f-930d-d903a714e4dc',
                'APPDATA' => 'C:\Users\ao\AppData\Roaming',
                'BIN_TARGET' => 'C:\laragon\www\work\panda\vendor\bin\/phpstan',
                'CHROME_DEVTOOLS_MCP_JS' => 'C:\Users\ao\AppData\Local\Programs\Antigravity\resources\app.asar.unpacked\node_modules\chrome-devtools-mcp\build\src\bin\chrome-devtools-mcp.js',
                'CHROME_DEVTOOLS_MCP_NO_CONFIG_DISCOVERY' => '1',
                'CHROME_DEVTOOLS_MCP_NO_UPDATE_CHECKS' => '1',
                'CHROME_DEVTOOLS_MCP_NO_USAGE_STATISTICS' => '1',
                'COLUMNS' => '90',
                'CommonProgramFiles' => 'C:\Program Files\Common Files',
                'CommonProgramFiles(x86)' => 'C:\Program Files (x86)\Common Files',
                'CommonProgramW6432' => 'C:\Program Files\Common Files',
                'COMPOSER_RUNTIME_BIN_DIR' => 'C:\laragon\www\work\panda\vendor\bin\\',
                'COMPUTERNAME' => 'ELITEX360',
                'ComSpec' => 'C:\WINDOWS\system32\cmd.exe',
                'C_EM64T_REDIST11' => 'C:\Program Files (x86)\Common Files\Intel\Shared Files\cpp\\',
                'DriverData' => 'C:\Windows\System32\Drivers\DriverData',
                'EFC_7648' => '1',
                'GIT_EDITOR' => 'false',
                'GRPC_DEFAULT_SSL_ROOTS_FILE_PATH' => 'C:\Users\ao\AppData\Local\Cheerdots\roots.pem',
                'HGEDITOR' => 'false',
                'HOME' => 'C:\Users\ao',
                'HOMEDRIVE' => 'C:',
                'HOMEPATH' => '\Users\ao',
                'JJ_EDITOR' => 'false',
                'LINES' => '9001',
                'LOCALAPPDATA' => 'C:\Users\ao\AppData\Local',
                'LOGONSERVER' => '\\\ELITEX360',
                'NUMBER_OF_PROCESSORS' => '8',
                'OneDrive' => 'C:\Users\ao\OneDrive',
                'OneDriveConsumer' => 'C:\Users\ao\OneDrive',
                'OS' => 'Windows_NT',
                'PATH' => 'C:\Program Files\PowerShell\7;C:/Users/ao/.gemini/antigravity/bin;C:\Users\ao\AppData\Roaming\Antigravity\bin;C:\Program Files (x86)\Common Files\Oracle\Java\java8path;C:\Program Files (x86)\Common Files\Oracle\Java\javapath;C:\Program Files (x86)\Common Files\Intel\Shared Files\cpp\bin\Intel64;C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\WINDOWS\System32\OpenSSH\;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\PuTTY\;C:\Program Files\GitHub CLI\;C:\Program Files\PowerShell\7-preview\preview;C:\Program Files\dotnet\;C:\Program Files\Tailscale\;C:\Program Files\nodejs\;C:\Program Files\PowerShell\7\;C:\ProgramData\envkit\bin;C:\ProgramData\envkit\services\php\8.5.12;C:\Users\ao\AppData\Local\agy\bin;C:\Users\ao\.local\bin;C:\Users\ao\AppData\Local\Yarn\config\global\node_modules\.bin;C:\Users\ao\AppData\Roaming\Composer\vendor\bin;C:\Users\ao\.console-ninja\.bin;C:\Users\ao\AppData\Local\Microsoft\WindowsApps;C:\Users\ao\AppData\Local\Programs\Microsoft VS Code\bin;C:\Users\ao\AppData\Local\GitHubDesktop\bin;C:\dev\flutter\bin;C:\Users\ao\AppData\Local\gitkraken\bin;C:\Users\ao\AppData\Local\Programs\Antigravity\bin;C:\Users\ao\AppData\Local\Programs\Zed\bin;C:\Users\ao\AppData\Roaming\npm;C:\Users\ao\AppData\Local\Google\Cloud SDK\google-cloud-sdk\bin;C:\Users\ao\.bun\bin',
                'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC;.CPL',
                'PHPRC' => 'C:\ProgramData\envkit\services\php\8.5.12\php.ini',
                'POWERSHELL_DISTRIBUTION_CHANNEL' => 'MSI:Windows 10 Pro',
                'PROCESSOR_ARCHITECTURE' => 'AMD64',
                'PROCESSOR_IDENTIFIER' => 'Intel64 Family 6 Model 142 Stepping 12, GenuineIntel',
                'PROCESSOR_LEVEL' => '6',
                'PROCESSOR_REVISION' => '8e0c',
                'ProgramData' => 'C:\ProgramData',
                'ProgramFiles' => 'C:\Program Files',
                'ProgramFiles(x86)' => 'C:\Program Files (x86)',
                'ProgramW6432' => 'C:\Program Files',
                'PROMPT' => '$P$G',
                'PSModulePath' => 'C:\Users\ao\Documents\PowerShell\Modules;C:\Program Files\PowerShell\Modules;c:\program files\powershell\7\Modules;C:\Program Files\WindowsPowerShell\Modules;C:\WINDOWS\system32\WindowsPowerShell\v1.0\Modules',
                'PUBLIC' => 'C:\Users\Public',
                'PYTHONUTF8' => '1',
                'SESSIONNAME' => 'Console',
                'SHELL_VERBOSITY' => '0',
                'SystemDrive' => 'C:',
                'SystemRoot' => 'C:\WINDOWS',
                'TEMP' => 'C:\Users\ao\AppData\Local\Temp',
                'TMP' => 'C:\Users\ao\AppData\Local\Temp',
                'USERDOMAIN' => 'ELITEX360',
                'USERDOMAIN_ROAMINGPROFILE' => 'ELITEX360',
                'USERNAME' => 'ao',
                'USERPROFILE' => 'C:\Users\ao',
                'windir' => 'C:\WINDOWS',
                'ZES_ENABLE_SYSMAN' => '1',
            ],
        ];
    }

    protected function getDynamicParameter($key)
    {
        switch (true) {
            case $key === 'singleReflectionFile': return null;
            case $key === 'singleReflectionInsteadOfFile': return null;
            case $key === 'analysedPaths': return null;
            case $key === 'analysedPathsFromConfig': return null;
            case $key === 'sysGetTempDir': return sys_get_temp_dir();
            case $key === 'pro': return [
                'dnsServers' => ['1.1.1.2'],
                'tmpDir' => implode('', ['', sys_get_temp_dir(), '/phpstan-fixer']),
            ];
            default: return parent::getDynamicParameter($key);
        }
    }

    public function getParameters(): array
    {
        array_map([$this, 'getParameter'], [
            'bootstrapFiles',
            'excludePaths',
            'level',
            'paths',
            'exceptions',
            'featureToggles',
            'fileExtensions',
            'checkAdvancedIsset',
            'reportAlwaysTrueInLastCondition',
            'checkClassCaseSensitivity',
            'checkExplicitMixed',
            'checkImplicitMixed',
            'checkFunctionArgumentTypes',
            'checkFunctionNameCase',
            'checkInternalClassCaseSensitivity',
            'checkMissingCallableSignature',
            'checkMissingVarTagTypehint',
            'checkArgumentsPassedByReference',
            'checkMaybeUndefinedVariables',
            'checkNullables',
            'checkThisOnly',
            'checkUnionTypes',
            'checkBenevolentUnionTypes',
            'checkExplicitMixedMissingReturn',
            'checkPhpDocMissingReturn',
            'checkPhpDocMethodSignatures',
            'checkExtraArguments',
            'checkMissingTypehints',
            'checkTooWideParameterOutInProtectedAndPublicMethods',
            'checkTooWideReturnTypesInProtectedAndPublicMethods',
            'checkTooWideThrowTypesInProtectedAndPublicMethods',
            'checkUninitializedProperties',
            'checkDynamicProperties',
            'strictRulesInstalled',
            'deprecationRulesInstalled',
            'inferPrivatePropertyTypeFromConstructor',
            'checkStrictPrintfPlaceholderTypes',
            'reportMaybes',
            'reportMaybesInMethodSignatures',
            'reportMaybesInPropertyPhpDocTypes',
            'reportStaticMethodSignatures',
            'reportWrongPhpDocTypeInVarTag',
            'reportAnyTypeWideningInVarTag',
            'reportNonIntStringArrayKey',
            'reportUnsafeArrayStringKeyCasting',
            'reportPossiblyNonexistentGeneralArrayOffset',
            'reportPossiblyNonexistentConstantArrayOffset',
            'checkMissingOverrideMethodAttribute',
            'checkMissingOverridePropertyAttribute',
            'checkMissingOverrideConstantAttribute',
            'mixinExcludeClasses',
            'scanFiles',
            'scanDirectories',
            'parallel',
            'phpVersion',
            'polluteScopeWithLoopInitialAssignments',
            'polluteScopeWithAlwaysIterableForeach',
            'polluteScopeWithBlock',
            'propertyAlwaysWrittenTags',
            'propertyAlwaysReadTags',
            'additionalConstructors',
            'treatPhpDocTypesAsCertain',
            'usePathConstantsAsConstantString',
            'rememberPossiblyImpureFunctionValues',
            'tips',
            'tipsOfTheDay',
            'reportMagicMethods',
            'reportMagicProperties',
            'ignoreErrors',
            'internalErrorsCountLimit',
            'cache',
            'reportUnmatchedIgnoredErrors',
            'reportIgnoresWithoutComments',
            'typeAliases',
            'universalObjectCratesClasses',
            'stubFiles',
            'earlyTerminatingMethodCalls',
            'earlyTerminatingFunctionCalls',
            'resultCachePath',
            'resultCacheSkipIfOlderThanDays',
            'resultCacheChecksProjectExtensionFilesDependencies',
            'dynamicConstantNames',
            'customRulesetUsed',
            'editorUrl',
            'editorUrlTitle',
            'errorFormat',
            'sysGetTempDir',
            'sourceLocatorPlaygroundMode',
            'fixer',
            'pro',
            '__validate',
            'parametersNotInvalidatingCache',
            'checkOctaneCompatibility',
            'noEnvCallsOutsideOfConfig',
            'noModelMake',
            'noImplicitQueryBuilderCall',
            'noUnnecessaryCollectionCall',
            'noUnnecessaryCollectionCallOnly',
            'noUnnecessaryCollectionCallExcept',
            'noUnnecessaryEnumerableToArrayCalls',
            'squashedMigrationsPath',
            'databaseMigrationsPath',
            'disableMigrationScan',
            'disableSchemaScan',
            'configDirectories',
            'viewDirectories',
            'translationDirectories',
            'checkModelProperties',
            'checkUnusedViews',
            'checkMissingTranslations',
            'checkModelAppends',
            'checkModelMethodVisibility',
            'generalizeEnvReturnType',
            'checkConfigTypes',
            'checkAuthCallsWhenInRequestScope',
            'parseModelCastsMethod',
            'pivotTypesInCollections',
            'enableMigrationCache',
            'checkUniqueJobUniqueFor',
            'checkUniqueJobUniqueId',
            'noBatchedUniqueJob',
            'checkJobSerializesModels',
            'checkBatchedJobIsBatchable',
            'checkBatchableJobChecksCancellation',
            'checkDispatchInTransactionAfterCommit',
            'redisDriver',
            'tmpDir',
            'debugMode',
            'productionMode',
            'tempDir',
            'rootDir',
            'currentWorkingDirectory',
            'cliArgumentsVariablesRegistered',
            'additionalConfigFiles',
            'allConfigFiles',
            'composerAutoloaderProjectPaths',
            'generateBaselineFile',
            'usedLevel',
            'cliAutoloadFile',
            'attributeServicesDirectories',
            'attributeServicesClasses',
            'env',
            'singleReflectionFile',
            'singleReflectionInsteadOfFile',
            'analysedPaths',
            'analysedPathsFromConfig',
        ]);

        return parent::getParameters();
    }
}

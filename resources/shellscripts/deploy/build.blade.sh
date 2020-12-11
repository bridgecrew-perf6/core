cd {!! $release_path !!}

if [ -f "package.json" ]; then
    echo "🌅  Generating assets…";

    if [ -f "yarn.lock" ]; then
        {!! $cmd_yarn !!} run production
    else
        {!! $cmd_npm !!} run production
    fi

    echo "Removing \"node_modules\" directory"
    rm -rf node_modules
fi

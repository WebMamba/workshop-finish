import type { StorybookConfig } from "@sensiolabs/storybook-symfony-webpack5";

const config: StorybookConfig = {
    stories: ["../stories/**/*.stories.[tj]s", "../stories/**/*.mdx"],
    addons: [
        "@storybook/addon-webpack5-compiler-swc",
        "@storybook/addon-links",
        "@storybook/addon-essentials",
        "@storybook/addon-interactions",
    ],
    framework: {
        name: "@sensiolabs/storybook-symfony-webpack5",
        options: {
            // 👇 Here configure the framework
            symfony: {
                server: 'https://127.0.0.1:8000',
                proxyPaths: [
                    '/assets',
                    '/_components',
                ],
                additionalWatchPaths: [
                    'assets',
                    'var/tailwind/tailwind.built.css',
                ]
            }
        },
    },
    docs: {
        autodocs: "tag",
    },
};
export default config;

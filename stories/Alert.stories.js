import Alert from '../templates/components/Alert.html.twig';
import { twig } from '@sensiolabs/storybook-symfony-webpack5';
import {userEvent, waitFor, within, expect} from "@storybook/test";

export default {
  component: (args) => ({
    components: {Alert},
    template: twig`
      <twig:Alert color="{{ color }}">
        {{ message }}
      </twig:Alert>
  `
  }),
  argTypes: {
    message: { control: 'text' },
    color: {
      control: 'select',
      options: ['blue', 'red', 'yellow', 'green']
    },
  },
}

export const Default = {
  args: {
    message: 'Hello world!',
    color: 'blue'
  },
}

export const Play = {
  args: {
    message: 'Hello world!',
    color: 'blue'
  },
  play: async ({ canvasElement }) => {
    const canvas = within(canvasElement);

    await userEvent.click(canvas.getByRole('button'));

    await waitFor(() => {
      expect(canvas.queryByRole('alert')).not.toBeInTheDocument();
    });
  }
}

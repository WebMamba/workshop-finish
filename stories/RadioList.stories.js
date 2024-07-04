import {twig} from "@sensiolabs/storybook-symfony-webpack5";
import {userEvent, waitFor, within, expect} from "@storybook/test";

export default {
  component: (args) => ({
    template: twig`
      <twig:RadioList />
    `
  }),
}

export const Default = {
};

export const Play = {
  play: async ({ canvasElement }) => {
    const canvas = within(canvasElement);

    await userEvent.type(canvas.getByRole('searchbox'), '90');

    await waitFor(() => {
      expect(canvas.queryAllByRole('listbox')).toHaveLength(4)
    });

    await userEvent.clear(canvas.getByRole('searchbox'));

    await userEvent.type(canvas.getByRole('searchbox'), 'frfrf');

    await waitFor(() => {
      expect(canvas.queryAllByRole('listbox')).toHaveLength(0)
    });

    await userEvent.clear(canvas.getByRole('searchbox'));

    await userEvent.type(canvas.getByRole('searchbox'), '80');

    await waitFor(() => {
      expect(canvas.queryAllByRole('listbox')).toHaveLength(18)
    });
  },
}
